
@extends ('layouts.master') @section ('content') 
<div class="row">
    <div class="col l12">
        <div class="card grey">
            <div class="card-content white">
                <span class="card-title">Site Administration Utilities</span>
                <div class="btn-group center-align">
                    <a href="{{ route('profile-types') }}" class="btn waves waves-effect grey" id="ept_btn" value="Edit Profile Types">Edit Profile Types</a>
                    <button class="btn waves waves-effect grey" id="est_btn" value="Edit Stash Types">Edit Stash Types</button>
                    <button class="btn waves waves-effect grey" id="esit_btn" value="Edit Stash Item Types">Edit Stash Item Types</button>
                    <button class="btn waves waves-effect grey" id="esidf_btn" value="Edit Stash Item Data Fields">Edit Stash Item Data Fields</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-fixed-footer" id="sa_modal">
    <div class="modal-content"></div>
    <div class="modal-footer">
        <div class="btn waves waves-effect-light grey" id="sa_modal_cncl">
            Cancel
        </div>
    </div>
</div>
<script src="/js/siteadmin.js">
</script>
<script src="/js/userprofiletypes.js">
</script>
<script src="/js/stashtypes.js">
</script>
<script src="/js/stashitemtypes.js">
</script>
<script src="/js/stashitemavailfields.js">
</script>
</script> @endsection

