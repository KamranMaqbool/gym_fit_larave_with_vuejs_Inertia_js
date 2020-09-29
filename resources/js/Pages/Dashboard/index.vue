<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="co-md-12">
                    <h1>Welcome To K Company &#x1f4bb;</h1>
                    <p>&#x1f6b9; <strong>Name: </strong>{{name}}</p>
                    <p>&#x1f4f2; <strong>Contact No. </strong>{{contact}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <reminder-list :reminders="reminders"></reminder-list>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import ReminderList from './ReminderList.vue'
export default {
    props: ['name', 'degree','contact','reminders'],
    components: {
        ReminderList,
        Layout
    }
}

</script>
