<div id="jitsi-container" class="sticky z-50 w-screen h-screen top-0 bg-white">
    <div id="jitsi" class="h-full w-full"></div>
</div>

<div class="mx-4 my-2">
    <button id="video-btn" class="bg-blue-500 text-white rounded-md px-3 py-1.5" onclick="updateVideo()">
        <svg id="video-on" class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                clip-rule="evenodd" />
        </svg>
        <svg id="video-off" class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="m4 15.6 3.055-3.056A4.913 4.913 0 0 1 7 12.012a5.006 5.006 0 0 1 5-5c.178.009.356.027.532.054l1.744-1.744A8.973 8.973 0 0 0 12 5.012c-5.388 0-10 5.336-10 7A6.49 6.49 0 0 0 4 15.6Z" />
            <path
                d="m14.7 10.726 4.995-5.007A.998.998 0 0 0 18.99 4a1 1 0 0 0-.71.305l-4.995 5.007a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.402.211.59l-4.995 4.983a1 1 0 1 0 1.414 1.414l4.995-4.983c.189.091.386.162.59.211.011 0 .021.007.033.01a2.982 2.982 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z" />
            <path
                d="m19.821 8.605-2.857 2.857a4.952 4.952 0 0 1-5.514 5.514l-1.785 1.785c.767.166 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z" />
        </svg>
    </button>
</div>

<script>
    var video = false;
    var started = false;

    function updateVideo() {
        const participants = api.getParticipantsInfo();
        const localParticipant = participants.find(p => p.formattedDisplayName.includes(
            "{{ auth()->user()->login_id }}"));
        api.executeCommand("toggleVideo");
    }
</script>
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
        const participants = api.getParticipantsInfo();
        const localParticipant = participants.find(p => p.formattedDisplayName.includes(
            "{{ auth()->user()->login_id }}"));

        document.querySelector('#jitsi-container').classList.add('w-0');
        document.querySelector('#jitsi-container').classList.add('h-0');
        document.querySelector('#jitsi-container').classList.add('hidden');
        
        if (localParticipant.isVideoMuted) {
            document.querySelector('#video-btn #video-on').classList.add('hidden');
            document.querySelector('#video-btn #video-off').classList.remove('hidden');
        } else {
            document.querySelector('#video-btn #video-on').classList.remove('hidden');
            document.querySelector('#video-btn #video-off').classList.add('hidden');
        }
        
        api.addListener('videoMuteStatusChanged', (event) => {
            console.log("Camera toggled:", event.muted ? "Off" : "On");

            // Perform custom actions here
            if (event.muted) {
                document.querySelector('#video-btn #video-on').classList.add('hidden');
                document.querySelector('#video-btn #video-off').classList.remove('hidden');
            } else {
                document.querySelector('#video-btn #video-on').classList.remove('hidden');
                document.querySelector('#video-btn #video-off').classList.add('hidden');
            }
        });

        api.executeCommand('toggleTileView');
    });
    api.on('readyToClose', function() {
        api.dispose();
    });
</script>
