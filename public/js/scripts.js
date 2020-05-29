// js parkiran
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='cparkiran']:checked").val()){
        $('#kparkir').removeAttr('disabled');
        $('#fparkir').removeAttr('hidden');
    } else {
        $('#kparkir').attr('disabled','disabled'); 
        $('#fparkir').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="cparkiran"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#kparkir').attr('disabled','disabled'); 
            $('#kparkir').val('');
            $('#fparkir').attr('hidden','hidden');
            $('#fparkir').val('');
        } else {
            $('#kparkir').removeAttr('disabled');
            $('#kparkir').focus();
            $('#fparkir').removeAttr('hidden');
        }
    });
});

// js guiding blocks
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='cgb']:checked").val()){
        $('#kgb').removeAttr('disabled');
        $('#fgb').removeAttr('hidden');
    } else {
        $('#kgb').attr('disabled','disabled'); 
        $('#fgb').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="cgb"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#kgb').attr('disabled','disabled'); 
            $('#kgb').val('');
            $('#fgb').attr('hidden','hidden');
            $('#fgb').val('');
        } else {
            $('#kgb').removeAttr('disabled');
            $('#kgb').focus();
            $('#fgb').removeAttr('hidden');
        }
    });
});

// js permukaan jalan
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='cpermukaan']:checked").val()){
        $('#kpj').removeAttr('disabled');
        $('#fpj').removeAttr('hidden');
    } else {
        $('#kpj').attr('disabled','disabled'); 
        $('#fpj').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="cpermukaan"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#kpj').attr('disabled','disabled'); 
            $('#kpj').val('');
            $('#fpj').attr('hidden','hidden');
            $('#fpj').val('');
        } else {
            $('#kpj').removeAttr('disabled');
            $('#kpj').focus();
            $('#fpj').removeAttr('hidden');
        }
    });
});

// js bidang miring
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='cbidangmiring']:checked").val()){
        $('#kbm').removeAttr('disabled');
        $('#fbm').removeAttr('hidden');
    } else {
        $('#kbm').attr('disabled','disabled'); 
        $('#fbm').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="cbidangmiring"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#kbm').attr('disabled','disabled'); 
            $('#kbm').val('');
            $('#fbm').attr('hidden','hidden');
            $('#fbm').val('');
        } else {
            $('#kbm').removeAttr('disabled');
            $('#kbm').focus();
            $('#fbm').removeAttr('hidden');
        }
    });
});

// js pintu
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='cpintu']:checked").val()){
        $('#kpintu').removeAttr('disabled');
        $('#fpintu').removeAttr('hidden');
    } else {
        $('#kpintu').attr('disabled','disabled'); 
        $('#fpintu').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="cpintu"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#kpintu').attr('disabled','disabled'); 
            $('#kpintu').val('');
            $('#fpintu').attr('hidden','hidden');
            $('#fpintu').val('');
        } else {
            $('#kpintu').removeAttr('disabled');
            $('#kpintu').focus();
            $('#fpintu').removeAttr('hidden');
        }
    });
});

// js running text
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='crunningtext']:checked").val()){
        $('#krt').removeAttr('disabled');
        $('#frt').removeAttr('hidden');
    } else {
        $('#krt').attr('disabled','disabled'); 
        $('#frt').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="crunningtext"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#krt').attr('disabled','disabled'); 
            $('#krt').val('');
            $('#frt').attr('hidden','hidden');
            $('#frt').val('');
        } else {
            $('#krt').removeAttr('disabled');
            $('#krt').focus();
            $('#frt').removeAttr('hidden');
        }
    });
});

// js lift
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='clift']:checked").val()){
        $('#klift').removeAttr('disabled');
        $('#flift').removeAttr('hidden');
    } else {
        $('#klift').attr('disabled','disabled'); 
        $('#flift').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="clift"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#klift').attr('disabled','disabled'); 
            $('#klift').val('');
            $('#flift').attr('hidden','hidden');
            $('#flift').val('');
        } else {
            $('#klift').removeAttr('disabled');
            $('#klift').focus();
            $('#flift').removeAttr('hidden');
        }
    });
});

// js toilet
$(document).ready(function() {
    // Kondisi saat Form di-load
    if($("input[name='ctoilet']:checked").val()){
        $('#ktoilet').removeAttr('disabled');
        $('#ftoilet').removeAttr('hidden');
    } else {
        $('#ktoilet').attr('disabled','disabled'); 
        $('#ftoilet').attr('hidden','hidden'); 
    }
    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="ctoilet"]').click(function() {
        if (!$(this).is(':checked')) {
            $('#ktoilet').attr('disabled','disabled'); 
            $('#ktoilet').val('');
            $('#ftoilet').attr('hidden','hidden');
            $('#ftoilet').val('');
        } else {
            $('#ktoilet').removeAttr('disabled');
            $('#ktoilet').focus();
            $('#ftoilet').removeAttr('hidden');
        }
    });
});


