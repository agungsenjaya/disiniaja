function addCetak(e) {
    let pak = e;
    pak.qty = 1;
    cetak.push(pak);

    subtotal += parseInt(e.price.replace(".", ""));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`.cetak-${e.id}`).addClass("opacity-0");

    $("#tambah").append(` <li class="list-group-item border-0 cetak" id="cetak-${e.id}" data-price="${e.price.replace(".", "")}" data-total="${e.price.replace(".", "")}">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary" onClick="delCetak(${e.id})">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary text-capitalize">Cetak ${e.name}</h6>
                <div class="d-flex justify-content-between">
                  <div>
                    Rp <span class="price-text">${e.price}</span>
                  </div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary min-${e.id}" disabled onClick="minCetak(${e.id})" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control cetak-form-${e.id}" disabled value="1">
  <button class="btn btn-primary plus-${e.id}" onClick="pluCetak(${e.id})" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>`);

    // console.log(cetak);
}

function delCetak(e) {
    subtotal -= parseInt($(`#cetak-${e}`).attr("data-total"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`#cetak-${e}`).remove();
    cetak = cetak.filter(function (ele) {
        return ele.id != e;
    });

    $(`.cetak-${e}`).removeClass("opacity-0");

    console.log(subtotal);
}

function pluCetak(e) {
    $(`.min-${e}`).removeAttr("disabled");
    let a = $(`.cetak-form-${e}`).val();
    let b = parseInt(a) + 1;
    $(`.cetak-form-${e}`).val(b);
    let c = parseInt($(`#cetak-${e}`).attr("data-total")) + parseInt($(`#cetak-${e}`).attr("data-price"));
    $(`#cetak-${e}`).attr("data-total", c);
    $(`#cetak-${e} .price-text`).text(c.toLocaleString("id-ID"));
    cetak = cetak.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal += parseInt($(`#cetak-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(cetak);
}

function minCetak(e) {
    let a = $(`.cetak-form-${e}`).val();
    let b = parseInt(a) - 1;
    if (b <= 1) {
        $(`.min-${e}`).attr("disabled", true);
    }
    $(`.cetak-form-${e}`).val(b);
    let c = parseInt($(`#cetak-${e}`).attr("data-total")) - parseInt($(`#cetak-${e}`).attr("data-price"));
    $(`#cetak-${e}`).attr("data-total", c);
    $(`#cetak-${e} .price-text`).text(c.toLocaleString("id-ID"));

    cetak = cetak.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal -= parseInt($(`#cetak-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(subtotal);
    // console.log(cetak);
}