<script>
export default {
  name: "arrow",
  props: {
    arrowOn: Boolean
  }
}
</script>

<template>
  <svg v-if="arrowOn" width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7 0L13.9282 12H0.0717969L7 0Z" fill="#7843E9"/>
  </svg>
  <svg v-else width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7 0L13.9282 12H0.0717969L7 0Z" fill="#C4ABFB"/>
  </svg>
</template>