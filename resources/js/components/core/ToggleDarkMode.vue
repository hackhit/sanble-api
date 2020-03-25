<template>
  <div class="toggleWrapper">
    <input type="checkbox" class="absolute dn" v-model="toggle.toggle" id="dn" />
    <label for="dn" class="toggle">
      <span class="toggle__handler">
        <span class="crater crater--1"></span>
        <span class="crater crater--2"></span>
        <span class="crater crater--3"></span>
      </span>
      <span class="star star--1"></span>
      <span class="star star--2"></span>
      <span class="star star--3"></span>
      <span class="star star--4"></span>
      <span class="star star--5"></span>
      <span class="star star--6"></span>
    </label>
  </div>
</template>

<script>
export default {
  name: 'ToggleDarkMode',
  props: ['toggle']
}
</script>

<style scoped>
.toggleWrapper input {
  left: -99em;
}
.absolute {
  position: absolute;
}
.toggleWrapper .toggle {
  cursor: pointer;
  display: inline-block;
  position: relative;
  width: 45px;
  height: 25px;
  background-color: #83d8ff;
  border-radius: 84px;
  transition: background-color 0.2s cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
.toggleWrapper .toggle__handler {
  display: inline-block;
  position: relative;
  z-index: 1;
  top: 3px;
  left: 3px;
  width: 19px;
  height: 19px;
  background-color: #ffcf96;
  border-radius: 50px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transform: rotate(-22.5deg);
}
.toggleWrapper .toggle__handler .crater {
  position: absolute;
  background-color: #e8cda5;
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
  border-radius: 100%;
}
.toggleWrapper .toggle__handler .crater--1 {
  top: 9px;
  left: 5px;
  width: 2px;
  height: 2px;
}
.toggleWrapper .toggle__handler .crater--2 {
  top: 14px;
  left: 11px;
  width: 3px;
  height: 3px;
}
.toggle__handler .crater--3 {
  top: 5px;
  left: 12.5px;
  width: 4px;
  height: 4px;
}
.toggleWrapper .star {
  position: absolute;
  background-color: #fff;
  transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95);
  border-radius: 50%;
}
.toggleWrapper .star--1 {
  top: 5px;
  left: 17.5px;
  z-index: 0;
  width: 15px;
  height: 1.5px;
}
.toggleWrapper .star--2 {
  top: 9px;
  left: 14px;
  z-index: 1;
  width: 15px;
  height: 1.5px;
}
.toggleWrapper .star--3 {
  top: 13.5px;
  left: 20px;
  z-index: 0;
  width: 15px;
  height: 1.5px;
}
.toggleWrapper .star--4,
.toggleWrapper .star--5,
.toggleWrapper .star--6 {
  opacity: 0;
  transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0;
}
.toggleWrapper input:checked + .toggle {
  background-color: #858585;
  /* background-color: #749dd6; */
}

.toggleWrapper input:checked + .toggle .toggle__handler {
  background-color: #ffe5b5;
  transform: translate3d(20px, 0, 0) rotate(0);
}
.toggleWrapper input:checked + .toggle .toggle__handler .crater {
  opacity: 1;
}
.toggleWrapper input:checked + .toggle .star--1 {
  width: 1px;
  height: 1px;
}
.toggleWrapper input:checked + .toggle .star--2 {
  width: 2px;
  height: 2px;
  transform: translate3d(-2.5px, 0, 0);
}
.toggleWrapper input:checked + .toggle .star--3 {
  width: 1px;
  height: 1px;
  transform: translate3d(-3.5px, 0, 0);
}
.toggleWrapper input:checked + .toggle .star--4 {
  transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.2s;
}
.toggleWrapper input:checked + .toggle .star--5 {
  transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.3s;
}
.toggleWrapper input:checked + .toggle .star--6 {
  transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.4s;
}
</style>