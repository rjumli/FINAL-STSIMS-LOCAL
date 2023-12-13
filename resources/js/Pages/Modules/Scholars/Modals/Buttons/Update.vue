<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered>
        <template v-slot:header>
            <h5 class="modal-title">Update Scholar</h5>
            <button @click="hide()" type="button" class="btn-close" aria-label="Close"></button>
        </template>

        <b-form class="customform mb-2">
            <div class="row">

                    <div class="col-md">
                        <!-- <div class="row align-items-center g-3">
                            <div class="col-md-auto">
                               <b-img class="img-thumbnail rounded-circle avatar-sm" :src="currentUrl+'/imagess/avatars/avatar.jpg'" data-holder-rendered="true"></b-img>
                            </div>
                            <div class="col-md">
                                <div>
                                    <h6 class="fw-bold">JUMLI, RA-OUF</h6>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div><i class="ri-building-line align-bottom me-1"></i> Zamboanga Campus</div>
                                        <div class="vr"></div>
                                        <div><i class="ri-map-pin-2-fill align-bottom me-1"></i>Guiwan</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="p-3 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <b-img class="img-thumbnail rounded-circle avatar-sm" :src="currentUrl+'/imagess/avatars/avatar.jpg'" data-holder-rendered="true"></b-img>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1 fw-bold text-primary">RA-OUF JUMLI</h6>
                                    <span :class="'badge bg-secondary bg-success'">Good Standing</span>
                                </div>
                            </div>
                        </div>

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
            selected: '',
            form: {},
            type: ''
        }
    },
    methods : {
        set(data,type){
            this.selected = data;
            this.type = type;
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
