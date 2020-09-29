<template>
	<Layout>
		<div class="container">
			<div class="row mb-3">
                <div class="col-md-12">
                    <h4>
                        <inertia-link :href="$route('lead.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('lead.view',{lead:lead})">Leads Details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder View
                    </h4>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="card">
            			<div class="card-header">
            				Add Reminder &#x2795;
            			</div>
            			<div class="card-body">
                            <reminder-add-form 
                                :main-reminder="reminder"
                                :lead="lead"
                                @reminderOnSubmit="handleSubmit">
                            </reminder-add-form>
            			</div>
            		</div>
            	</div>
            </div>
		</div>
	</Layout>
</template>


<script>
import Layout from '../../shared/Layout.vue'
import ReminderAddForm from './ReminderForm.vue'
	export default {
	name: 'ViewReminder',
    props:{
        lead:Object,
        reminder:Object,
    },
    components: {
        Layout,
        ReminderAddForm,
    },
    methods:{
    	handleSubmit(postData){
    		debugger
    	}
    },
    created(){
        
    }
	}
</script>