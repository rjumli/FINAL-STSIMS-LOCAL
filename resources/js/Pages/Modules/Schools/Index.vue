<template>
    <Head title="Schools" />
    <PageHeader :title="title" :items="items" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
           
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px)">
            <Lists :dropdowns="dropdowns.data" :regions="regions"/>
        </div>
    </div>
</template>
<script>
import Lists from './Lists.vue';
import PageHeader from "@/Shared/Components/PageHeader.vue";
export default {
    props: ['regions','dropdowns'],
    components : { PageHeader, Lists },
    data() {
        return {
            title: "List of Schools",
            items: [{text: "Lists",href: "/",},{text: "School",active: true,},]
        };
    }
}
</script>