document.addEventListener("DOMContentLoaded", function() {
  const customerTab = document.getElementById("customerTab");
  const vehicleTab = document.getElementById("vehicleTab");
  const driverTab = document.getElementById("driverTab");
  const customerContent = document.getElementById("customerContent");
  const vehicleContent = document.getElementById("vehicleContent");
  const driverContent = document.getElementById("driverContent");

  customerTab.addEventListener("click", function() {
    switchTab(customerTab, customerContent);
  });

  vehicleTab.addEventListener("click", function() {
    switchTab(vehicleTab, vehicleContent);
  });

  driverTab.addEventListener("click", function() {
    switchTab(driverTab, driverContent);
  });

  function switchTab(selectedTab, selectedContent) {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(function(tab) {
      tab.classList.remove('active');
    });

    tabContents.forEach(function(content) {
      content.classList.remove('active');
    });

    selectedTab.classList.add('active');
    selectedContent.classList.add('active');
  }
});
