<script>
import Arrow from "@/components/Arrow.vue";
import SubItem from "@/components/SubItem.vue";
import axios from "axios";

export default {
  name: "Item",
  components: {SubItem, Arrow},
  emits: ['moveItem', 'destroy'],
  props: {
    data: Object,
    index: Number,
    canMoveUp: Boolean,
    canMoveDown: Boolean
  },
  data() {
    return {
      showSubItems: false,
    }
  },
  methods: {
    move(direction) {
      this.$emit('moveItem', {id: this.data.id, index: this.index, direction})
    },

    destroy() {
      this.$emit('destroy', {id: this.data.id, index: this.index})
    }
  }
}
</script>

<template>
  <div class="flex flex-row items-center pl-16 pr-6 w-full mt-6">
    <div class="flex flex-col gap-1 w-11 items-center">
      <Arrow :arrow-on="canMoveUp" :class="canMoveUp ? 'cursor-pointer' : 'cursor-not-allowed'" @click="canMoveUp && move('up')"></Arrow>
      <Arrow :arrow-on="canMoveDown" :class="canMoveDown ? 'cursor-pointer' : 'cursor-not-allowed'" class="rotate-180" @click="canMoveDown && move('down')"></Arrow>
    </div>
    <div class="flex flex-row items-center bg-[#F8FAFC] border-0 rounded-lg w-full">
      <div class="grid grid-cols-12 h-14 ml-[22px] w-full items-center">
        <div class="col-span-3 flex flex-row items-center">
          <span class="mr-3">{{ data.name }}</span>
          <svg v-if="Array.isArray(data.children) && data.children.length" @click="showSubItems = !showSubItems" :class="showSubItems ? 'rotate-90' : ''" class="cursor-pointer" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.5 1L6.5 6L1.5 11" stroke="#828282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <input class="col-span-2 p-0 w-9 h-9 text-center border-1 border-gray-400 rounded-lg" type="text" :value="data.count">
        <div class="col-span-2">
          {{ data.source }}
        </div>
        <div class="grid grid-cols-4 col-span-4">
          <div>{{ data.laser }}</div>
          <div>{{ data.welding }}</div>
          <div>{{ data.assembling }}</div>
          <div>{{ data.electro }}</div>
        </div>
      </div>

      <div class="flex flex-row gap-4 mr-8">
        <button class="bg-[#7843E9] w-10 h-10 p-0 flex flex-col items-center justify-center border-0 rounded-lg">
          <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.8924 9.76528C13.4018 7.29422 13.0954 4.01793 10.9601 1.87938C8.4564 -0.624284 4.38142 -0.624284 1.87775 1.87938C-0.625917 4.38305 -0.625917 8.45803 1.87775 10.9584C4.01304 13.0937 7.28932 13.4002 9.76365 11.8908L13.4311 15.5583C14.0179 16.1451 14.9731 16.1451 15.5599 15.5583C16.1467 14.9715 16.1467 14.0163 15.5599 13.4295L11.8924 9.76528ZM9.63325 9.63488C7.85982 11.4083 4.978 11.4083 3.20782 9.63488C1.43439 7.86145 1.43439 4.97963 3.20782 3.20946C4.98126 1.43603 7.86308 1.43603 9.63325 3.20946C11.4034 4.97963 11.4034 7.86145 9.63325 9.63488ZM7.17196 5.60554H9.10839V7.08232H7.17196V9.01875H5.69519V7.08232H3.76202V5.60554H5.69845V3.66911H7.17522V5.60554H7.17196Z" fill="#F8FAFC"/>
          </svg>
        </button>
        <button @click="destroy()" class="bg-red-500 w-10 h-10 p-0 flex flex-col items-center justify-center border-0 rounded-lg">
          <svg width="24" height="24" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.1 2.48684V2.62304C8.8794 2.69431 9.65562 2.7968 10.4268 2.93024C10.485 2.94033 10.5407 2.96178 10.5906 2.99338C10.6406 3.02498 10.6838 3.06611 10.7178 3.11442C10.7519 3.16272 10.7761 3.21726 10.789 3.27491C10.802 3.33257 10.8035 3.39221 10.7934 3.45044C10.7833 3.50867 10.7619 3.56434 10.7303 3.61428C10.6987 3.66421 10.6575 3.70744 10.6092 3.74148C10.5609 3.77552 10.5064 3.79972 10.4487 3.81268C10.3911 3.82565 10.3314 3.82713 10.2732 3.81704L10.1478 3.79604L9.5448 11.638C9.51004 12.0902 9.30589 12.5126 8.97317 12.8207C8.64045 13.1288 8.20369 13.3 7.7502 13.3H3.0504C2.59692 13.3 2.16016 13.1288 1.82744 12.8207C1.49472 12.5126 1.29057 12.0902 1.2558 11.638L0.652204 3.79604L0.526804 3.81704C0.468576 3.82713 0.408931 3.82565 0.351276 3.81268C0.293621 3.79972 0.239084 3.77552 0.190779 3.74148C0.0932221 3.67273 0.0269725 3.56804 0.00660391 3.45044C-0.0137647 3.33285 0.0134161 3.21197 0.082167 3.11442C0.150918 3.01686 0.255607 2.95061 0.373204 2.93024C1.14436 2.79664 1.92059 2.69415 2.7 2.62304V2.48684C2.7 1.54844 3.4278 0.746842 4.3896 0.716242C5.06323 0.694684 5.73738 0.694684 6.411 0.716242C7.3728 0.746842 8.1 1.54844 8.1 2.48684ZM4.4184 1.61564C5.07284 1.59471 5.72777 1.59471 6.3822 1.61564C6.834 1.63004 7.2 2.01044 7.2 2.48684V2.55464C6.00111 2.48183 4.7989 2.48183 3.6 2.55464V2.48684C3.6 2.01044 3.9654 1.63004 4.4184 1.61564ZM4.2054 5.18264C4.20312 5.12355 4.18922 5.06548 4.16449 5.01176C4.13977 4.95804 4.1047 4.90971 4.0613 4.86954C4.0179 4.82937 3.96701 4.79814 3.91154 4.77764C3.85607 4.75713 3.7971 4.74776 3.738 4.75004C3.67891 4.75233 3.62084 4.76623 3.56712 4.79096C3.5134 4.81568 3.46507 4.85075 3.4249 4.89415C3.38473 4.93755 3.3535 4.98844 3.333 5.04391C3.3125 5.09938 3.30312 5.15835 3.3054 5.21744L3.5136 10.6174C3.51822 10.7367 3.57002 10.8493 3.65762 10.9303C3.701 10.9705 3.75185 11.0017 3.80729 11.0222C3.86272 11.0427 3.92165 11.052 3.9807 11.0497C4.03976 11.0475 4.09779 11.0336 4.15147 11.0089C4.20516 10.9841 4.25345 10.9491 4.29359 10.9057C4.33374 10.8624 4.36494 10.8115 4.38543 10.7561C4.40592 10.7006 4.41529 10.6417 4.413 10.5826L4.2054 5.18264ZM7.4934 5.21744C7.4978 5.15721 7.49003 5.09671 7.47056 5.03955C7.45109 4.98238 7.4203 4.92972 7.38005 4.88471C7.3398 4.83969 7.29089 4.80324 7.23625 4.77751C7.18161 4.75179 7.12235 4.73734 7.06201 4.735C7.00166 4.73266 6.94147 4.7425 6.885 4.76392C6.82854 4.78533 6.77696 4.8179 6.73335 4.85967C6.68973 4.90144 6.65497 4.95156 6.63113 5.00705C6.6073 5.06254 6.59488 5.12225 6.5946 5.18264L6.3864 10.5826C6.38179 10.702 6.42477 10.8183 6.5059 10.9059C6.58703 10.9936 6.69966 11.0454 6.819 11.05C6.93835 11.0547 7.05464 11.0117 7.1423 10.9305C7.22995 10.8494 7.28179 10.7368 7.2864 10.6174L7.4934 5.21744Z" fill="#F8FAFC"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
  <div v-if="showSubItems">
    <SubItem v-for="item in data.children" :data="item"></SubItem>
  </div>
</template>