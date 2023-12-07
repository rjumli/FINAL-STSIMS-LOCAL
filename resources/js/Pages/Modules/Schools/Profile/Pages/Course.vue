<template>
    <b-col lg>
        <div class="input-group mb-3 mt-n1">
            <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
            <input type="text" v-model="keyword" placeholder="Search scholar" class="form-control" style="width: 30%;">
        </div>
    </b-col>
    <div class="table-responsive mb-3">
        <table class="table align-middle table-nowrap mb-0">
            <thead class="table-light fs-11">
                <tr>
                    <th>Name</th>
                    <th class="text-center">Scholars</th>
                    <th class="text-center">Certification</th>
                    <th class="text-center">Validity</th>
                    <th class="text-center">Status</th>
                    <th class="text-end"></th>
                </tr>
            </thead>
            <tbody class="list form-check-all">
                <tr v-for="list in courses" v-bind:key="list.id">
                    <td class="fs-12 fw-medium">{{list.course}}</td>
                    <td class="text-center">{{list.scholars}}</td>
                    <td class="text-center">{{list.certification}}</td>
                    <td class="text-center">{{list.validity}}</td>
                    <td class="text-center">
                        <span v-if="list.is_active" class="badge bg-success">Active</span>
                        <span v-else class="badge bg-danger">Inactive</span>
                    </td>
                    <td class="text-end">
                        <b-button @click="openProspectus(list)" variant="soft-primary" v-b-tooltip.hover title="View" size="sm" class="edit-list"><i class="ri-eye-fill align-bottom"></i> </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
    <div class="align-items-center mt-4 justify-content-between d-flex">
        <div class="flex-shrink-0">
            <div class="text-muted">Showing <span class="fw-semibold">{{(currentPage == 1) ? '1' : ((currentPage -1) * itemsPerPage) + 1 }}-{{(courses.length == currentPage) ? courses.length : currentPage * itemsPerPage }}</span> of <span class="fw-semibold">{{courses.length}}</span> Results</div>
        </div>
        <ul class="pagination pagination-separated pagination-sm mb-0">
            <li class="page-item" :class="(currentPage === 1) ? 'disabled' : ''"><a class="page-link" href="#/"  @click="previousPage" :disabled="currentPage === 1" target="_self">previous</a></li>
            <li class="page-item" :class="(currentPage === totalPages) ? 'disabled' : ''"><a class="page-link" href="#/" @click="nextPage" target="_self">next</a></li>
        </ul>
    </div>
    <Prospectus :term="term" ref="prospectus"/>
</template>
<script>
import Prospectus from './Modals/Prospectus/Index.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Prospectus },
    props: ['id','courses','term'],
    data(){
        return {
            itemsPerPage: 5,
            currentPage: 1,
        }
    },
    computed: {
        totalPages() {
            return Math.ceil(this.courses.length / this.itemsPerPage);
        },
        paginatedData() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.courses.slice(start, end);
        },
    },
    methods: {
        openProspectus(data){
            this.$refs.prospectus.show(data);
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        gotoPage(pageNumber) {
            if (pageNumber >= 1 && pageNumber <= this.totalPages) {
                this.currentPage = pageNumber;
            }
        },
    }
}
</script>