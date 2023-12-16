<template>
    <b-modal v-model="showModal" hide-footer class="v-modal-custom" modal-class="zoomIn" fullscreen>
        <template v-slot:header>
            <b-row class="mb-3 mt-n1">
                <b-col md>
                  <b-row class="align-items-center g-3">
                    <b-col md="auto">
                        <b-img class="img-thumbnail rounded-circle" style="width: 60px; height: 60px;" alt="img" src="/imagess/avatars/avatar.jpg" data-holder-rendered="true"></b-img>
                    </b-col>
                    <b-col md>
                        <div>
                            <h5 class="fw-semibold">{{user.profile.name}}</h5>
                            <div class="hstack gap-3 flex-wrap">
                                <div class="text-muted">Spas ID :
                                    <span class="text-body fw-medium">{{user.spas_id}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Program : 
                                    <span class="text-body fw-medium">{{user.program}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Subprogram : 
                                    <span class="text-body fw-medium">{{user.subprogram}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Awarded Year : 
                                    <span class="text-body fw-medium">{{user.awarded_year}}</span>
                                </div>
                            </div>
                        </div>
                    </b-col>
                  </b-row>
                </b-col>
              </b-row>
            <i @click="showModal=false" class="ri-close-circle-fill float-end" style="cursor:pointer; font-size: 40px; margin-top: -37px; margin-bottom: -20px;"></i>
        </template>
        <div class="row">
            <div class="col-md-3 mt-n3" >
                <table class="table table-bordered">
                    <tbody>
                        <tr style="border-top: none;">
                            <td style="border-left: none; border-top: none;"><span class="fw-semibold fs-12">Scholar Information</span></td>
                        </tr>
                        <tr>
                            <td style="border-left: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mt-0">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-service-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Status :</p> <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-building-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">School :</p><h6 class="text-truncate mb-0"> {{user.education.school.name}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="mdi mdi-school"></i></div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Course :</p> <h6 class="text-truncate mb-0"> {{user.education.course.name}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-calendar-fill"></i></div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Level :</p> <h6 class="text-truncate mb-0"> {{user.education.level.name}} <span class="text-muted fs-11">({{user.education.level.others}})</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: none;"><span class="fw-semibold fs-12">Location Information</span></td>
                        </tr>
                        <tr>
                            <td style="border-left: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mt-0">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-map-pin-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Address :</p>  <h6 class="text-truncate mb-0"> {{(user.address.address) ? user.address.address : 'n/a'}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-pushpin-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Municipality :</p>  <h6 class="text-truncate mb-0"> {{user.address.municipality.name}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-road-map-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Province :</p>  <h6 class="text-truncate mb-0"> {{user.address.province.name}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex mt-3">
                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                    <i class="ri-earth-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1 fs-12 text-muted">Region :</p> <h6 class="text-truncate mb-0"> {{user.address.region.name}} </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- <div class="row">
                    <div class="col-md-12 mt-0">
                        <span class="fw-semibold fs-12">Scholar Information</span>
                        <hr class="text-muted"/>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-0">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-service-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Status :</p> <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-building-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">School :</p><h6 class="text-truncate mb-0"> {{user.education.school.name}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="mdi mdi-school"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Course :</p> <h6 class="text-truncate mb-0"> {{user.education.course.name}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-calendar-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Level :</p> <h6 class="text-truncate mb-0"> {{user.education.level.name}} <span class="text-muted fs-11">({{user.education.level.others}})</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <hr class="text-muted"/>
                        <span class="fw-semibold fs-12">Location Information</span>
                        <hr class="text-muted"/>
                    </div>
                </div> -->
            </div>
        </div>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            showModal: false,
            user: {
                profile: {},
                status: {},
                education: {
                    school: {},
                    course: {},
                    level: {},
                    info: {}
                },
                addresses: [],
                address: { municipality: '', province: '', region: ''}
            },
            prospectuses: [],
        }
    },
    methods: {
        show(user){
            this.user = user;
            this.user.address = this.user.addresses[0];
            this.prospectuses = this.user.education.info.prospectus;
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        },
    }
}
</script>
<style>
.modal-header { 
    border-bottom: 1px solid #ccc;
}
</style>