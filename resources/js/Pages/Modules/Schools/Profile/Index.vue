<template>
    <Head :title="school.data.name" />
    <Top :school="school"/>
    <b-row>
        <Sidebar :id="school.data.id"/>
        <b-col lg="8">
            <b-row>
                <Count :school="school"/>
                <Main :school="school" :dropdowns="dropdowns"/>
            </b-row>
        </b-col>
    </b-row>
</template>
<script>
import Top from './Top.vue';
import Main from './Main.vue';
import Count from './Count.vue';
import Sidebar from './Sidebar.vue';
export default {
    components: { Top, Main, Count, Sidebar },
    props: ['school','dropdowns']
}
</script>