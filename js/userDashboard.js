$(document).ready(function () {
    addDesign();

})

$(function () {
    $('.chart').easyPieChart({
    });
});


function addDesign() {
    var html = '';

    // html +='<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">'
    html += '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body" >'
        + '<a href="eletricityEnergy.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart text-center" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Electricity</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="transport.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Transport</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="cropLand.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Crop Land</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="livestock.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Live Stock</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="forestLand.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Forest Land</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="landUSe.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Land Use</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="solidWaste.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Solid Waste</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="wasteWater.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Waste Water</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="industryEnergy.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Energy</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="industryPP.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Process & Product</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>'

        + '<div class="swiper-slide card">'
        + '<div class="testimonial-item card-body">'
        + '<a href="fueluseincity.php" style="display: block">'
        + '<div class="col-6 col-sm-4 col-md-6 col-lg-11">'
        + '<div class="chart" data-percent="20" data-scale-color="#0847b5">20%</div>'
        + '<div>Cooking</div>'
        + '</div>'
        + '</a>'
        + '</div>'
        + '</div>';




    $("#addDesign").append(html);

}