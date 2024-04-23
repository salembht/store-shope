<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
  categories: {
        type: Object,
        default: () => ({}),
    },
    brands:{
      type: Object,
        default: () => ({}),
    }
});
</script>
<script>
import { ref, onMounted } from 'vue';
import { inertia } from '@inertiajs/inertia';

export default {
  data() {
    return {
      product: {
        title: '',
        sluge: '',
        quantity: 0,
        description: '',
        published: 'false',
        inStock: 'false',
        price: 0,
        categoryId: null,
        brandId: null,
      },
    
      errors: []
    };
  },
  methods: {
    saveProduct() {
      this.$inertia.post('/products/store', this.product)
        .then(() => {
          // Handle successful response
        })
        .catch(error => {
        
        if (error.response.status === 422) {
          this.errors= error.response.data.errors;
        } else {
          console.error(error);
        }
      });
    },
  },
  async mounted() {
    
  },
};
</script>

<template>

  <AuthenticatedLayout>

    <Head title="add Products" />
    <main>
      <div>
        <div v-if="errors.length > 0" class="alert alert-danger">
          <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
          </ul>
        </div>
        <form @submit.prevent="saveProduct">
          <div>
            <label for="title">Title:</label>
            <input type="text" id="title" v-model="product.title" />
          </div>
          <div>
            <label for="sluge">sluge:</label>
            <input type="text" id="sluge" v-model="product.sluge" />
          </div>
          <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" v-model="product.quantity" />
          </div>
          <div>
            <label for="description">Description:</label>
            <textarea id="description" v-model="product.description"></textarea>
          </div>
          <div>
            <label for="published">Published:</label>
            <select id="published" v-model="product.published">
              <option :value="true">Yes</option>
              <option :value="false">No</option>
            </select>
          </div>
          <div>
            <label for="inStock">In Stock:</label>
            <select id="inStock" v-model="product.inStock">
              <option :value="true">Yes</option>
              <option :value="false">No</option>
            </select>
          </div>
          <div>
            <label for="price">Price:</label>
            <input type="number" id="price" v-model="product.price" />
          </div>
          <div>
            <label for="category">Category:</label>
            <select id="category" v-model="product.categoryId">
              <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
              </option>
            </select>
          </div>
          <div>
            <label for="brand">Brand:</label>
            <select id="brand" v-model="product.brandId">
              <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
            </select>
          </div>
          <button type="submit">Save</button>
        </form>
      </div>
    </main>
  </AuthenticatedLayout>
</template>