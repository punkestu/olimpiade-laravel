<div id="jitsi-container" class="sticky z-50 w-screen h-screen top-0 bg-white">
    <div id="jitsi" class="h-full w-full"></div>
</div>
<script>
    var domain = 'meet.jit.si';
    var options = {
        roomName: "vpaas-magic-cookie-5be5eb5971044a0b90dc1fa63a382948/{{ $room }}",
        width: '100%',
        height: '100%',
        parentNode: document.querySelector('#jitsi'),
        userInfo: {
            displayName: "{{ auth()->user()->name }} | {{ auth()->user()->login_id }}"
        },
        configOverwrite: {
            startWithAudioMuted: true,
            startWithVideoMuted: false,
            disableAudioLevels: true,
            disableModeratorIndicator: true,
            hideParticipantsStats: true,
            disableSelfView: true,
            enableNoisyMicDetection: false,
            prejoinPageEnabled: false,
            disableInviteFunctions: true,
            remoteVideoMenu: {
                disableKick: true,
                disableGrantModerator: true
            },
            disableProfile: true,
            enableClosePage: false
        },
        interfaceConfigOverwrite: {
            SHOW_JITSI_WATERMARK: false,
            SHOW_WATERMARK_FOR_GUESTS: false,
            SHOW_BRAND_WATERMARK: false,
            SHOW_POWERED_BY: false,
            SHOW_CHROME_EXTENSION_BANNER: false,
            TOOLBAR_BUTTONS: [],
            HIDE_INVITE_MORE_HEADER: true,
            HIDE_DEEP_LINKING_LOGO: true,
            SHOW_PROMOTIONAL_CLOSE_PAGE: false,
            MOBILE_APP_PROMO: false,
            SHOW_PROMOTIONAL_CLOSE_PAGE: false,
            SHOW_CONTACTS: false,
            SETTINGS_SECTIONS: [],
            SHOW_MEETING_NAME: false,
            SHOW_PARTICIPANT_NAME: false,
            TILE_VIEW_MAX_COLUMNS: 1
        }
    };
    var api = new JitsiMeetExternalAPI(domain, options);
    api.on('videoConferenceJoined', function() {
        document.querySelector('#jitsi-container').classList.add('w-0');
        document.querySelector('#jitsi-container').classList.add('h-0');
        document.querySelector('#jitsi-container').classList.add('hidden');

        api.executeCommand('toggleTileView');
    });
    api.on('readyToClose', function() {
        api.dispose();
    });
</script>
