$(function () {
    pretraziZivotinje();
    sortirajZivotinje();
});

function pretraziZivotinje() {

    $(document).on('keydown', '#input-pretraga', function () {

        let ime_tip = this.value;

        $.ajax(
            {
                url: 'pretrazi.php',
                method: 'post',
                data: { POST_ime_tip: ime_tip },
                success: function (rez) {
                    {
                        $('.zivotinje-tabela-div').html(rez);
                        
                    }
                }
            }
        )
    })
}

function sortirajZivotinje() {

    $(document).on('click', 'th', function () {

        let sort_kolona = $(this).attr('id');
        let sort_poredak = $(this).attr('name');

        $.ajax(
            {
                url: 'sortiraj.php',
                method: 'post',
                data: { kljucSortKolona: sort_kolona, kljucSortPoredak: sort_poredak },
                success: function (data) {
                    {
                        $('.zivotinje-tabela-div').html(data);
                    }
                }
            }
        )
    })
}