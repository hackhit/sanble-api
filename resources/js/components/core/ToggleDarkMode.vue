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
  name: "ToggleDarkMode",
  props: ["toggle"]
};
</script>

<style scoped lang="scss">
.toggleWrapper {
  margin-left: 5px;
  input {
    left: -99em;
  }
  .absolute {
    position: absolute;
  }
  .toggle {
    margin-top: 4px;
    cursor: pointer;
    display: inline-block;
    position: relative;
    width: 42px;
    // width: 45px;
    height: 20px;
    background-color: #73bce6;
    border-radius: 84px;
    transition: background-color 0.2s cubic-bezier(0.445, 0.05, 0.55, 0.95);
  }
  .toggle__handler {
    display: inline-block;
    position: relative;
    z-index: 1;
    top: -1.1px;
    left: 3px;
    width: 13.5px;
    height: 13.5px;
    background-color: #ffcf96;
    border-radius: 50px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    transform: rotate(-22.5deg);

    .crater {
      position: absolute;
      background-color: #e8cda5;
      opacity: 0;
      transition: opacity 0.2s ease-in-out;
      border-radius: 100%;
    }
    .crater--1 {
      top: 9px;
      left: 5px;
      width: 2px;
      height: 2px;
    }
    .crater--2 {
      top: 9px;
      left: 8px;
      width: 3px;
      height: 3px;
    }
    .crater--3 {
      top: 5px;
      left: 7.5px;
      width: 4px;
      height: 4px;
    }
  }
  .star {
    position: absolute;
    background-color: #fff;
    transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95);
    border-radius: 50%;
  }
  .star--1 {
    top: 5px;
    left: 17.5px;
    z-index: 0;
    width: 15px;
    height: 1.5px;
  }
  .star--2 {
    top: 9px;
    left: 14px;
    z-index: 1;
    width: 15px;
    height: 1.5px;
  }
  .star--3 {
    top: 13.5px;
    left: 20px;
    z-index: 0;
    width: 15px;
    height: 1.5px;
  }
  .star--4,
  .star--5,
  .star--6 {
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0;
  }
  input:checked + .toggle {
    background-color: #858585;
    /* background-color: #749dd6; */
  }

  input:checked + .toggle .toggle__handler {
    background-color: #ffe5b5;
    transform: translate3d(20px, 0, 0) rotate(0);
  }
  input:checked + .toggle .toggle__handler .crater {
    opacity: 1;
  }
  input:checked + .toggle .star--1 {
    width: 1px;
    height: 1px;
  }
  input:checked + .toggle .star--2 {
    width: 2px;
    height: 2px;
    transform: translate3d(-2.5px, 0, 0);
  }
  input:checked + .toggle .star--3 {
    width: 1px;
    height: 1px;
    transform: translate3d(-3.5px, 0, 0);
  }
  input:checked + .toggle .star--4 {
    transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.2s;
  }
  input:checked + .toggle .star--5 {
    transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.3s;
  }
  input:checked + .toggle .star--6 {
    transition: all 0.3s cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.4s;
  }
}
</style>