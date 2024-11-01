<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Olimpiade | {{ $title }}</title>
    <link rel="shortcut icon" href="/image/icon.png" type="image/x-icon">
    {{-- <script src="https://meet.jit.si/external_api.js"></script> --}}
</head>

<body class="relative">
    {{-- <div id="jitsi-container"></div>
    <script>
        var domain = 'meet.jit.si';
        var options = {
            roomName: 'Olimpiade-aksjdhqwhekjashd',
            width: '140px',
            height: '140px',
            parentNode: document.querySelector('#jitsi-container'),
            userInfo: {
                displayName: 'test'
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
            document.querySelector('#jitsi-container').classList.add('absolute');
            document.querySelector('#jitsi-container').classList.add('bottom-0');
            document.querySelector('#jitsi-container').classList.add('right-0');
            document.querySelector('#jitsi-container').classList.add('z-50');
            
            api.executeCommand('toggleTileView');
        });
        api.on('readyToClose', function() {
            api.dispose();
        });
    </script> --}}

    @if (!isset($hidenavbar))
        @include('components.navbar')
    @endif
    @can('admin')
        @include('components.sidebar')
    @endcan
    {{ $slot }}
</body>

</html>
