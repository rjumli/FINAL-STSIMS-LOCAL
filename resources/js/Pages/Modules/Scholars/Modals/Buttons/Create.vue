<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" size="xl" class="v-modal-custom" modal-class="zoomIn" centered>
        <template v-slot:header>
            <h5 class="modal-title">Create Scholar</h5>
            <button @click="hide()" type="button" class="btn-close" aria-label="Close"></button>
        </template>
        <b-form class="customform mb-2">
            <div class="row g-3">
                <div class="col-md-12 mb-n3">
                    <p class="text-muted mb-n2">Scholar Profile Infomation</p>
                    <hr class="text-muted"/>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Lastname</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Firstname</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Middlename</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Suffix</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Account no.</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Email</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Contact No.</label>
                    </div>
                </div>
                <div class="col-md-12 mb-n3">
                    <p class="text-muted mb-n2">Scholar Address Infomation</p>
                    <hr class="text-muted"/>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Region</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Province</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Municipality</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Barangay</label>
                    </div>
                </div>
                 <div class="col-md-8">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstnamefloatingInput" placeholder="Enter your firstname">
                        <label for="firstnamefloatingInput">Address</label>
                    </div>
                </div>
                 <div class="col-md-12 mb-n3">
                    <p class="text-muted mb-n2">Scholar Education Infomation</p>
                    <hr class="text-muted"/>
                </div>
            </div>
        </b-form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Proceed</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            showModal: false,
            form: {}
        }
    },
    methods : {
        show(){
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
