var dataMateri = [{
        "LOID": "L001",
        "Language": "INDONESIA",
        "Subjects": "MitraACA Knowledge",
        "Description": "MITRACA merupakan program kemitraan yang menawarkan kerjasama yang saling menguntungkan bagi setiap professional.",
        "ImageID1": "https://img.youtube.com/vi/1mkOupOYwE8/hqdefault.jpg",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L002",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2021",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L003",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2022",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2022",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L004",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2020",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2020",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L005",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2019",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2019",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L006",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2018",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2018",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L007",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2017",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2017",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    },
    {
        "LOID": "L008",
        "Language": "INDONESIA",
        "Subjects": "Benefit Mitra ACA 2016",
        "Description": "Apa saja yang ditawarkan oleh MITRACA ? 1. Jenjang Karir, 2. Benefit dan Fasilitas, 3. Pelatihan, 4. Sistem Kerja",
        "ImageID1": "https://via.placeholder.com/286x180?text=Benefit+Mitraca+2016",
        "FileType1": "",
        "ImageID2": "",
        "FileType2": "",
    }
];

window.addEventListener('load', (event) => {
    var slides = [],
        indicators = [],
        html = '',
        activeClass
    dataMateri.forEach(item => {
        // set up the slide
        // activeClass = slides.length == 0 ? ' active ' : ''; // the carousel has to have 1 active slide when it starts or else nothing will show. We set the first one as 'active' based on the length of the array we're making (when it's 0, that means we on the first one)
        var fn = "ViewLearning('" + item.LOID + "')"
        html = '<div class="card" onclick="' + fn + '">'
        html += '<img class="card-img-top" src="' + item.ImageID1 + '" alt="Card image cap">'
        html += '<div class="card-body">'
        html += '<h5 class="card-title">' + item.Subjects + '</h5>'
        html += '</div></div>'
        slides.push(html);
    })

    // now add it to your carousel and fire it up!

    document.getElementById('list-item-materi').innerHTML = slides.join('');

    $("#list-item-materi").owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false,
                loop: false
            }
        }
    });
});

async function ViewLearning(ID) {
    const filterarray = dataMateri.filter(asd => asd.LOID == ID);
    var learningobejctID = filterarray[0].LOID;
    var bahasa = filterarray[0].Language;
    var title = filterarray[0].Subjects;
    var desc = filterarray[0].Description;
    var downloaditem1 = filterarray[0].ImageID2;
    $('#class-modal-dialog').attr('class', 'modal-dialog modal-lg');
    $('#modaltitle').text(title);
    $('#modalbody').empty();
    $('#modalfooter').empty();

    const res = await getModalView(modalLearning + "?learningobejctID=" + learningobejctID + "&bahasa=" + bahasa + "&desc=" + desc + "&downloaditem1=" + downloaditem1);

    $('#modalbody').html(res);

    $('#modal-general').modal({
        keyboard: false,
        backdrop: 'static',
        show: true
    });
}