<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Settings\RotationImage;
use App\Models\Users\UserNotificationPreferences;
use App\Models\Users\UserPreferences;
use App\Models\Users\UserPrivacyPreferences;
use App\Notifications\WelcomeNewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use mofodojodino\ProfanityFilter\Check;
use RestCord\DiscordClient;

class MyCzqoController extends Controller
{
    /**
     * Shows myczqo view.
     */
    public function viewMyCzqo()
    {
        //Create banner image
        $bannerImg = null;
        if (count(RotationImage::all()) >= 1) {
            $bannerImg = RotationImage::all()->random();
        }

        //Get quote of the day
        $quote = Cache::remember('myczqo.quote', now()->addHours(24), function () {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://quotes.rest/qod');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            return json_decode($output);
        });

        //Return view
        return view('my.index', [
            'bannerImg' => $bannerImg->path,
            'quote' => $quote,
            '_pageTitle' => 'myCZQO'
        ]);
    }

    /*
    Privacy Policy/Account Init
    */

    /**
     * POST route for accepting the privacy policy.
     *
     * @param Request $request
     *
     * @return redirect to myczqo
     */
    public function acceptPrivacyPolicy(Request $request)
    {
        //Get the user
        $user = Auth::user();

        //If they're already initiated...
        if ($user->init) {
            //Return them back to myczqo
            return redirect()->route('my.index')->with('error', 'You have already accepted our privacy policy.');
        }

        //Initate them
        $user->init = 1;

        //Did they opt into emails?
        $notifPrefs = UserNotificationPreferences::where('user_id', $user->id)->first();

        if ($request->get('optInEmails') == 'on') {
            $notifPrefs->event_notifications = 'email';
            $notifPrefs->news_notifications = 'email';
            $notifPrefs->save();
        }

        //Save the user
        $user->save();

        //Send them the welcome email
        $user->notify(new WelcomeNewUser($user));

        //Redirect to myczqo
        return redirect()->route('my.index')->with('success', "Welcome to Gander Oceanic, {$user->fname}! We are glad to have you on board.");
    }

    /**
     * GET request for denying privacy policy.
     *
     * @return redirect Logout
     */
    public function denyPrivacyPolicy()
    {
        //Get the user
        $user = Auth::user();

        //If they're already initiated...
        if ($user->init) {
            //Return them back to myczqo
            return redirect()->route('my.index')->with('error-modal', 'To cease accepting our privacy policy and end your membership with Gander Oceanic, please contact us as specified in the Privacy Policy.');
        }

        //Well lets log them out
        Auth::logout($user);

        //Delete their privacy, notifs, prefs
        $notifPrefs = UserNotificationPreferences::where('user_id', $user->id)->first();
        $notifPrefs->delete();
        $privPrefs = UserPrivacyPreferences::where('user_id', $user->id)->first();
        $privPrefs->delete();
        $prefs = UserPreferences::where('user_id', $user->id)->first();
        $prefs->delete();

        //Delete the user
        $user->delete();

        //Redirect
        return redirect()->route('index')->with('info', 'Your account has been removed from Gander Oceanic as you did not accept our Privacy Policy.');
    }

    /**
     * POST request for saving biography.
     *
     * @param Request $request
     *
     * @return redirect to myczqo
     */
    public function saveBiography(Request $request)
    {
        $this->validate($request, [
            'bio' => 'sometimes|max:5000',
        ]);

        //Get user
        $user = Auth::user();

        //Get input
        $input = $request->get('bio');

        //No swear words.. give them the new bio
        $user->bio = $input;
        $user->save();

        //Redirect
        return redirect()->back()->with('success', 'Biography saved! Be sure to check your biography privacy settings in Manage Preferences.');
    }

    /*
    Avatars
    */

    /**
     * POST request for changing avatar to a custom image.
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function changeAvatarCustomImage(Request $request)
    {
        //Validate
        $messages = [
            'file.mimes'    => 'The image must be either a JPEG, PNG, JPG, or GIF file.',
            'file.required' => 'Please select an image to upload.',
            'file.max'      => 'Images must be 2MB in size or below.',
            'file.images'   => 'The image must be either a JPEG, PNG, JPG, or GIF file.',
        ];

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);

        //Get user
        $user = Auth::user();

        //Put it onto disk
        $path = Storage::disk('digitalocean')->put('user_uploads/'.$user->id.'/avatars', $request->file('file'), 'public');

        //Change the avatar url and mode
        $user->avatar = Storage::url($path);
        $user->avatar_mode = 1;
        $user->save();

        //Return
        return redirect()->route('my.index')->with('success', 'Avatar changed to a custom image!');
    }

    /**
     * GET request for changing avatar to Discord avatar.
     *
     * @return redirect
     */
    public function changeAvatarDiscord()
    {
        //Get user
        $user = Auth::user();

        //They need Discord don't they
        if (!$user->discord_linked) {
            return redirect()->route('my.index')->with('error-modal', 'You must link your Discord account first.');
        }

        //Change avatar mode and save
        $user->avatar_mode = 2;
        $user->save();

        //Forget cache
        Cache::forget('users.discorduserdata.'.$user->id.'.avatar');

        //Return
        return redirect()->route('my.index')->with('success', 'Avatar changed to your Discord avatar!');
    }

    /**
     * GET request for changing avatar to initials.
     *
     * @return redirect
     */
    public function changeAvatarInitials()
    {
        //Get user
        $user = Auth::user();

        //Change mode and save
        $user->avatar_mode = 0;
        $user->save();

        //Return
        return redirect()->route('my.index')->with('success', 'Avatar changed to your initials!');
    }

    /**
     * POST request for changing user display name.
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function changeDisplayName(Request $request)
    {
        //Validate
        $this->validate($request, [
            'display_fname' => 'required',
            'format'        => 'required',
        ]);

        //Get user
        $user = Auth::user();

        //No swear words... give them the new name!
        $user->display_fname = $request->get('display_fname');
        if ($request->get('format') == 'showall') {
            $user->display_last_name = true;
            $user->display_cid_only = false;
        } elseif ($request->get('format') == 'showfirstcid') {
            $user->display_last_name = false;
            $user->display_cid_only = false;
        } else {
            $user->display_last_name = false;
            $user->display_cid_only = true;
        }
        $user->save();

        //Member of guild?
        if ($user->member_of_discord_guild)
        {
            //Get Discord client
            $discord = new DiscordClient(['token' => config('services.discord.token')]);

            //Create the full arguments
            $arguments = [
                'guild.id' => intval(config('services.discord.guild_id')),
                'user.id'  => $user->discord_user_id,
                'nick'     => $user->full_name_cid,
            ];

            //Modify
            $discord->guild->modifyGuildMember($arguments);
        }

        //Redirect
        return redirect()->back()->with('success', 'Display name saved! If your avatar is set to default, it may take a while for the initials to update.');
    }

    /**
     * GET request for accessing preferences.
     *
     * @return view
     */
    public function preferences()
    {
        //Get preferences
        $preferences = Auth::user()->preferences;

        //return
        return view('my.preferences', compact('preferences'));
    }

    /**
     * POST AJAX request for updating preferneces.
     *
     * @param Request $request
     *
     * @return response
     */
    public function preferencesPost(Request $request)
    {
        //Validate
        $validator = Validator::make($request->all(), [
            'preference_name' => 'required',
            'value'           => 'required',
            'table'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed'], 400);
        }

        //Get user's preferences object
        switch ($request->get('table')) {
            case 'main':
                $preferences = Auth::user()->preferences;
            break;
            case 'notifications':
                $preferences = UserNotificationPreferences::where('user_id', Auth::id())->first();
                break;
            case 'privacy':
                $preferences = UserPrivacyPreferences::where('user_id', Auth::id())->first();
        }

        //Change variable
        $preferences->{$request->get('preference_name')} = $request->get('value');
        $preferences->save();

        //Return
        return response()->json(['message' => 'Saved'], 200);
    }
}
