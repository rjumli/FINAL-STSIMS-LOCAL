<template>
    <b-row class="g-2 mb-2 mt-n1">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="keyword" placeholder="Search School" class="form-control" style="width: 30%;">
                <Multiselect class="form-control" @select="fetch()"
                label="region" trackBy="region" placeholder="Select Region"
                v-model="region" :close-on-select="true" 
                :searchable="true" :options="regions.data" />
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="ri-map-pin-fill text-primary search-icon"></i>
                </span>
                <b-button type="button" variant="primary" @click="showCreate()">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th></th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 15%;" class="text-center">School</th>
                    <th style="width: 15%;" class="text-center">Program</th>
                    <th style="width: 15%;" class="text-center">Awarded Year</th>
                    <th style="width: 15%;" class="text-center">Status</th>
                    <th style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list in lists" v-bind:key="list.id" :class="[(list.is_active == 0) ? 'table-warnings' : '']">
                    <td>
                        <div class="avatar-xs chat-user-img online">
                            <span v-if="list.avatar == 'school.jpg'" :class="'avatar-title rounded-circle bg-primary text-white'">{{list.name[0]}}</span>
                            <img v-else :src="currentUrl+'/images/avatars/'+list.avatar" alt="" class="avatar-xs rounded-circle">
                            <span v-if="list.is_main" class="user-status text-success"></span>
                        </div>
                    </td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.display}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.address}}</p>
                    </td>
                    <td class="text-center">{{list.class}}</td>
                    <td class="text-center">{{list.term}}</td>
                    <td class="text-center">{{list.grading}}</td>
                    <td class="text-center">
                        <span v-if="list.is_active" class="badge bg-success">Active</span>
                        <span v-else class="badge bg-danger">Inactive</span>
                    </td>
                    <td class="text-end">
                        <Link :href="`/schools/${list.code}`">
                            <button class="btn btn-soft-dark btn-sm" type="button">
                                <div class="btn-content"> View </div>
                            </button>
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Create :dropdowns="dropdowns" ref="create"/>
</template>
<script>
import Create from './Modals/Create.vue';
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    props: ['regions','dropdowns'],
    components : { Pagination, Multiselect, Create },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            provinces: [],
            municipalities: [],
            region: null,
            keyword: null
        }
    },
    created(){
        this.fetch();
    },  
    watch: {
        keyword(newVal){
            this.checkSearchStr(newVal)
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url) {
            page_url = page_url || '/schools';
            axios.get(page_url, {
                params: {
                    keyword: this.keyword,
                    region: this.region,
                    counts: ((window.innerHeight-370)/56),
                    type: 'lists'
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
            })
            .catch(err => console.log(err));
        },
        showCreate(){
            this.$refs.create.show();
        }
    }
}
</script>