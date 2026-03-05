<template>
  <header class="color-principal text-white px-6 py-4">
    <div class="flex items-center justify-between">

      <!-- IZQUIERDA: Logo + Título -->
      <div class="flex items-center gap-6">
        <img
          :src="Logo_Puebla"
          alt="Logo Puebla"
          class="w-[130px]"
        />

        <h1 class="text-xl font-bold">
          | ANEXO IV
        </h1>
      </div>


      <!-- CENTRO: Navegación -->
       <!--
      <nav class="flex gap-6">
        <router-link to="/" class="hover:text-gray-300">
          Inicio
        </router-link>

        <router-link to="/usuarios" class="hover:text-gray-300">
          Usuarios
        </router-link>
      </nav>
     -->

      <!-- DERECHA: Botón regresar + Usuario + Logout -->
      <div class="flex items-center gap-4">

        <!-- Botón regresar -->
        <button
          class="bg-white text-black px-3 py-1 rounded shadow hover:bg-gray-200 cursor-pointer font-bold"
          @click="regresar"
        >
          ← Regresar
        </button>

        <img
          :src="Usuario"
          alt="Usuario"
          class="w-6 h-6"
        />

        <span class="font-bold text-white">
          Usuario
        </span>

        <img
         :src="Logaout"
          alt="Cerrar sesión"
          title="Cerrar sesión"
          class="w-6 h-6 cursor-pointer"
          @click="cerrarSesion"
        />
      </div>

    </div>
  </header>
</template>

<script setup>
import { useRouter } from 'vue-router'
import Logo_Puebla from '../assets/Logo_Puebla.png'
import Logaout from '../assets/Logout.png'
import Usuario from '../assets/Usuario.png'

const router = useRouter()

// Botón regresar
const regresar = () => {
  router.back()
}

// Método de logout (ejemplo)
const cerrarSesion = () => {
  console.log('Cerrar sesión...')
}
</script>
