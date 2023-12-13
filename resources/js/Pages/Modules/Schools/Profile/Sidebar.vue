<template>
    <b-col lg="4">
        <b-card>
            <b-card-body style="height: calc(100vh - 320px);">
                <simplebar data-simplebar style="max-height: calc(100vh - 340px);">
                    <b-card no-body class="mb-1 ribbon-box ribbon-fill ribbon-sm">
                        <div class="ribbon ribbon-success"><i class="ri-flashlight-fill"></i></div>
                        <b-card-body>
                            <b-link v-if="semester" class="d-flex align-items-center" role="button" v-b-toggle.contactInitiated1>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1">{{semester.academic_year}}</h6>
                                    <p class="text-muted mb-0">{{semester.start_at}} - {{semester.end_at}}</p>
                                </div>
                            </b-link>
                        </b-card-body>
                    </b-card>
                    <hr class="text-muted mt-4"/>
                        <h6 class="fs-11 text-muted text-uppercase mb-3">Scholars Enrolled</h6>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-group-2-fill text-dark fs-17"></i>
                            </div>
                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                <div class="progress mb-2 progress-sm">
                                    <div class="progress-bar bg-dark" role="progressbar" :style="'width: 2%'" :aria-valuenow="2"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-muted fs-12 d-block text-truncate"><b>1</b> out of <b>2</b> ongoing scholars are enrolled in this semester.</span>
                            </div>
                        </div>
                    <hr class="text-muted mb-4"/>
                </simplebar>
                
            </b-card-body>
        </b-card>
    </b-col>
</template>
<script>
import simplebar from 'simplebar-vue';
export default {
    components: { simplebar },
    props: ['semester']
}
</script>