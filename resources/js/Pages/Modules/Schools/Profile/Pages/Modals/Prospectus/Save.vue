<template>
    <b-modal v-model="showModal" title="Update Prospectus" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <b-form class="customform">
            <div class="row">
                Are you sure you want to save the changes?
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
    data() {
        return {
            currentUrl: window.location.origin,
            showModal: false,
            prospectus: '',
            subjects: '',
            form: {}
        }
    },
    methods: {
        set(data,subjects){
            this.prospectus = data;
            this.subjects = subjects;
            this.showModal = true;
        },
        save(){
            this.form = this.$inertia.form({
                id: this.prospectus.id,
                subjects: this.subjects,
                type: 'prospectus',
                subtype: 'save'
            });

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
