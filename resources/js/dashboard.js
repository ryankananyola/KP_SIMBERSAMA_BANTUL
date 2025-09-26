import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {
    var ctx1 = document.getElementById('jenisSampahChart').getContext('2d');
    var jenisSampahChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Organik', 'Anorganik', 'B3'],
            datasets: [{
                data: [30, 50, 20],  // Ganti dengan data yang sesuai
                backgroundColor: ['#FF5733', '#33FF57', '#FFFC33'],
            }]
        }
    });

    var ctx2 = document.getElementById('sumberSampahChart').getContext('2d');
    var sumberSampahChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Rumah Tangga', 'Perkantoran', 'Pasar Tradisional'],
            datasets: [{
                data: [60, 30, 10],  // Ganti dengan data yang sesuai
                backgroundColor: ['#4CAF50', '#FFEB3B', '#FF9800'],
            }]
        }
    });
});
