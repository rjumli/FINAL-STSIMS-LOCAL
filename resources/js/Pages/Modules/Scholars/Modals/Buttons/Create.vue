<template>
    <b-modal v-model="showModal" hide-footer header-class="p-3 bg-light" size="xl" class="v-modal-custom" modal-class="zoomIn" centered>
        <template v-slot:header>
            <h5 class="modal-title">Create Scholar</h5>
            <button @click="hide()" type="button" class="btn-close" aria-label="Close"></button>
        </template>

    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            showModal: false
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
