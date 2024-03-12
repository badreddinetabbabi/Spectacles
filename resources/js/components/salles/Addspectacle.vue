<template>
    
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <h4 align="center">Ajout Spectacle</h4>
  
      <form @submit.prevent="addspectacle">
        <div class="form-group mb-3">
          <label for="salle" class="form-label">Choix de la Salle</label>
          <select v-model="spectacle.salleID" class="form-control" id="salle">
            <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libelle }}</option>
          </select>
        </div>
  
        <div class="form-group mb-3">
  <label for="piece" class="form-label">Choix de la Pièce</label>
  <select v-model="spectacle.pieceID" class="form-control" id="piece">
    <option v-for="piece in pieces" :key="piece.id" :value="piece.id">{{ piece.titre }}</option>
  </select>
</div>
  
        <div class="form-group mb-3">
          <label for="dateSpectacle" class="form-label">Date du Spectacle</label>
          <input type="date" v-model="spectacle.dateSpectacle" class="form-control" id="dateSpectacle" required>
        </div>
  
        <button type="submit" class="btn btn-outline-primary">
          <i class="fa-solid fa-floppy-disk"></i> Enregistrer
        </button>
  
        <router-link to="/listSpectacles" class="btn btn-outline-danger mx-2">
          <i class="fa-solid fa-xmark"></i> Annuler
        </router-link>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import { useRouter } from 'vue-router';
  const router = useRouter()
  import axios from 'axios';
  
  const spectacle = ref({
    salleID: "",
    pieceID: "",
    dateSpectacle: "",
  });
  
  const salles = ref([]);
  const pieces = ref([]);
  
  const getSalles = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/salles');
      salles.value = response.data;
    } catch (error) {
      console.error('Error fetching salles:', error);
    }
  };
  
  const getPieces = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/pieces');
      pieces.value = response.data;
    } catch (error) {
      console.error('Error fetching pieces:', error);
    }
  };
  
  const addSpectacle = async () => {
    try {
      await axios.post("http://localhost:8000/api/spectacles", spectacle.value);
      router.push({ name: 'ListSpectacles' }); // Assuming the list route name is 'ListSpectacles'
      console.log("Spectacle saved successfully!");
    } catch (error) {
      console.error('Error adding spectacle:', error);
    }
  };
  
  onMounted(() => {
    getSalles();
    getPieces();
  });
  </script>
  
  <style scoped>
    /* Add custom styles here if needed */
  </style>
  