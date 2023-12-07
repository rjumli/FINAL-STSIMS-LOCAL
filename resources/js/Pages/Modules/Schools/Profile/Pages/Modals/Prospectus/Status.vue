<template>
    <b-modal v-model="showModal" :title="(subtype == 'lock') ? 'Lock Prospectus' : 'Update Prospectus Status'" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <b-form class="customform">
            <div class="row" v-if="type == 'lock'">
                <div class="col-md-12 mt-2 mb-n3" v-if="!prospectus.is_locked">
                    <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label" role="alert"><i class="ri-error-warning-line label-icon"></i>You won't be able to update the prospectus anymore! </div>
                </div>
                 <div class="col-md-12 mt-2 mb-n3" v-else>
                    <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label" role="alert"><i class="ri-error-warning-line label-icon"></i>You will be able to update the prospectus again! </div>
                </div>
            </div>
            <div class="row" v-else>
                <div class="col-md-12 mt-2 mb-n3" v-if="prospectus.is_active">
                    <div class="alert alert-success alert-dismissible alert-label-icon rounded-label" role="alert"><i class="ri-error-warning-line label-icon"></i>Make prospectus active</div>
                </div>
                 <div class="col-md-12 mt-2 mb-n3" v-else>
                    <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label" role="alert"><i class="ri-error-warning-line label-icon"></i>Make prospectus inactive </div>
                </div>
            </div>
        </b-form>
        <template v-slot:footer>
            <b-button @click="showModal = false" variant="light" block>Cancel</b-button>
            <b-button @click="save('ok')" variant="primary"  block>Update</b-button>
        </template>
    </b-modal>
</template>

<script>
export default {
    props: ['lists'],
    data() {
        return {
            currentUrl: window.location.origin,
            showModal: false,
            subtype: '',
            prospectus: '',
            form: {}
        }
    },
    methods: {
        set(data,subtype){
            this.subtype = subtype;
            this.prospectus = data;
            this.showModal = true;
        },
        save(){
            if(this.subtype == 'lock'){
                this.form = this.$inertia.form({
                    id: this.prospectus.id,
                    is_locked: (this.prospectus.is_locked) ? 0 : 1,
                    type: 'prospectus',
                    subtype: this.subtype
                });
            }else if(this.subtype == 'status'){
                this.form = this.$inertia.form({
                    id: this.prospectus.id,
                    is_active: (this.prospectus.is_active) ? 0 : 1,
                    type: 'prospectus',
                    subtype: this.subtype
                });
            }else{
                this.form = this.$inertia.form({
                    id: this.prospectus.id,
                    subjects: this.subjects,
                    type: 'prospectus',
                    subtype: this.subtype
                });
            }

            this.form.put('/schools/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.showModal = false;
                }
            });
        }
    }
}
</script>
