<template>
    <b-modal v-model="showModal" title="Create Semester List" size="xl" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <b-form class="customform mb-2">
            <div class="row customerform">
                <div>
                    <table class="table table-borderless align-middle">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th style="width: 20%;">Academic Year</th>
                                <th style="width: 25%;" class="text-center">FIRST SEMESTER</th>
                                <th style="width: 25%;" class="text-center">SECOND SEMESTER</th>
                                <th style="width: 25%;" class="text-center">SUMMER</th>
                                <th style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(course, index) in lists" v-bind:key="'a-'+index3" class="mb-n4">   
                               
                                <td width="15%">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="Academic Year"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                        </div>
                                    </div>
                                </td>
                                <td width="27%">
                                    <div class="input-group mb-1">
                                        <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="Start"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                            <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="End"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                    </div>
                                </td>
                                <td width="27%">
                                    <div class="input-group mb-1">
                                        <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="Start"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                            <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="End"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                    </div>
                                </td>
                                <td width="27%">
                                    <div class="input-group mb-1">
                                        <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="Start"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                            <Multiselect class="form-control"
                                            label="name" trackBy="name" placeholder="End"
                                            v-model="region" :close-on-select="true" 
                                            :searchable="true" :options="[{ value: 1, name: '2020-2021'}]" />
                                    </div>
                                </td>
                                <td class="text-end" width="4%">
                                    <b-button @click="rmv(index)" variant="soft-danger" v-b-tooltip.hover title="Remove" class="edit-list"><i class="ri-delete-bin-5-line align-bottom"></i> </b-button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </b-form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Save</b-button>
        </template>
    </b-modal>
</template>
<script>
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';
// import Multiselect from '@suadelabs/vue3-multiselect';
export default {
    components: { Multiselect, DatePicker },
    props: ['semesters','type'],
    data(){
        return {
            showModal: false,
            semester: {
                from: '',
                to: '',
                start: '',
                end: '',
                year: '',
                semester: {}
            },
            lists: [{semester: '',year: '',from: '',to: ''}],
            id: '',
            form: {},
            editable: false,
        }
    },

    computed : {
        academic_year : function(){
            if(this.semester.from != ''){
                this.year = new Date(this.semester.from).getFullYear();
                return new Date(this.semester.from).getFullYear()+'-'+ (Number(new Date(this.semester.from).getFullYear())+1);
            }else{
                return '';
            }
        },
    },
    methods : {
        show(id) {
            this.id = id;
            this.showModal = true;
        },

        create(){
            this.form = this.$inertia.form({
                school_id: this.id,
                academic_year: (this.semester.from) ? this.academic_year : '',
                start_at: (this.semester.start != '') ? new Date(this.semester.start).toLocaleDateString("af-ZA") : '',
                end_at: (this.semester.end != '') ? new Date(this.semester.end.getFullYear(),this.semester.end.getMonth() + 1, 0).toLocaleDateString("af-ZA"): '',
                year: this.year,
                semester_id: this.semester.semester.id,
                editable: false,
                type: 'semester'
            })

            this.form.post('/schools',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.hide();
                },
            });
        },

        hide(){
            this.$emit('status', true);
            (this.form.hasOwnProperty('reset') ) ? this.form.reset().clearErrors() : this.semester = {};
            this.showModal = false;
        },

        disabledBeforeTodayAndAfterAWeek(date) {
            // return date < new Date('2020/12/31');
        },
    }
}
</script>
