<template>
    <BCol xxl="12">
        <BCard no-body style="position: relative;">
            <BCardHeader class="align-items-xl-center d-flex">
                <div class="flex-grow-1 oveflow-hidden">
                    <p class="text-muted text-end xtext-truncates mb-1">Schools</p>
                </div>
            </BCardHeader>
            <BCardBody style="height: calc(100vh - 447px)">
                <BTabs nav-class="card-header-pills text-muted tamp" pills small>
                    <BTab title="Semesters">
                        <Semester :id="school.data.id" :term="school.data.term" :dropdowns="dropdowns"/>
                    </BTab>
                    <BTab title="Gradings">
                        <Grading :id="school.data.id" :gradings="school.data.gradings"/>
                    </BTab>  
                    <BTab title="Courses">
                        <Course :id="school.data.id" :term="school.data.term" :courses="school.data.courses"/>
                    </BTab>
                    <BTab title="Overview">
                        
                    </BTab>
                </BTabs>
            </BCardBody>
        </BCard>
    </BCol>
</template>
<script>
import Course from './Pages/Course.vue';
import Grading from './Pages/Grading.vue';
import Semester from './Pages/Semester.vue';
export default {
    components: { Course, Grading, Semester },
    props: ['school','dropdowns']
}
</script>
<style>
.tamp {
    position: absolute;
    top: 11px;
    left: 20px;
}
</style>