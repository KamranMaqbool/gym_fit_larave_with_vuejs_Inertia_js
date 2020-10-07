<template>
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="name">Name: &#x1f64e;</label>
            <input type="text" class="form-control" placeholder="Enter name" v-model="localPackage.name" id="name" tabindex="1">
            <div class="error" v-if="$page.errors.name">{{ $page.errors.name[0] }}</div>
        </div>
        <div class="form-group">
            <label for="name">Amount: &#x1f4b0;</label>
            <input type="text" class="form-control" placeholder="Enter amont" v-model="localPackage.amount" id="amont" tabindex="3">
            <div class="error" v-if="$page.errors.amont">{{ $page.errors.amont[0] }}</div>
        </div>
        <div class="form-group">
            <label for="name">Number Of Days: &#x1f522;</label>
            <input type="text" class="form-control" placeholder="Enter number of days" v-model="localPackage.number_of_days" id="number_of_days" tabindex="5">
            <div class="error" v-if="$page.errors.number_of_days">{{ $page.errors.number_of_days[0] }}</div>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</template>
<script>
export default {
    name: "PackageAddForm",
    props:{
    	packageData:Object,
    },
    data(){
    	return {
    		localPackage:{
    			name:"",
    			amount:"",
    			number_of_days:0
    		}
    	}
    },
    created(){
    	this.localPackage = this.packageData;
    },
    methods:{
    	handleSubmit(){
    		let data = {
    			name:this.localPackage.name,
    			amount:this.localPackage.amount,
    			number_of_days:this.localPackage.number_of_days,
    		}
    		this.$emit('packageAdded',data);

    		this.localPackage={
    			name:"",
    			amount:"",
    			number_of_days:"",
    		}
    	}
    }
}

</script>
