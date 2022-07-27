function addPaket(e) {
    let pak = e;
    pak.qty = 1;
    paket.push(pak);

    subtotal += parseInt(e.price.replace(".", ""));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`.paket-${e.id}`).addClass("opacity-0");

    $("#paket").append(` <li class="list-group-item border-0 paket" id="paket-${e.id}" data-price="${e.price.replace(".", "")}" data-total="${e.price.replace(".", "")}">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary" onClick="delPaket(${e.id})">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary text-capitalize">${e.name}</h6>
                <div class="d-flex justify-content-between">
                  <div>
                    Rp <span class="price-text">${e.price}</span>
                  </div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary min-${e.id}" disabled onClick="minPaket(${e.id})" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control paket-form-${e.id}" disabled value="1">
  <button class="btn btn-primary plus-${e.id}" onClick="plusPaket(${e.id})" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>`);

    // console.log(paket);
}

function delPaket(e) {
    subtotal -= parseInt($(`#paket-${e}`).attr("data-total"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`#paket-${e}`).remove();
    paket = paket.filter(function (ele) {
        return ele.id != e;
    });

    $(`.paket-${e}`).removeClass("opacity-0");

    console.log(subtotal);
}

function plusPaket(e) {
    $(`.min-${e}`).removeAttr("disabled");
    let a = $(`.paket-form-${e}`).val();
    let b = parseInt(a) + 1;
    $(`.paket-form-${e}`).val(b);
    let c = parseInt($(`#paket-${e}`).attr("data-total")) + parseInt($(`#paket-${e}`).attr("data-price"));
    $(`#paket-${e}`).attr("data-total", c);
    $(`#paket-${e} .price-text`).text(c.toLocaleString("id-ID"));
    paket = paket.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal += parseInt($(`#paket-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(paket);
    e.preventDefault();
}

function minPaket(e) {
    let a = $(`.paket-form-${e}`).val();
    let b = parseInt(a) - 1;
    if (b <= 1) {
        $(`.min-${e}`).attr("disabled", true);
    }
    $(`.paket-form-${e}`).val(b);
    let c = parseInt($(`#paket-${e}`).attr("data-total")) - parseInt($(`#paket-${e}`).attr("data-price"));
    $(`#paket-${e}`).attr("data-total", c);
    $(`#paket-${e} .price-text`).text(c.toLocaleString("id-ID"));

    paket = paket.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal -= parseInt($(`#paket-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(subtotal);
    // console.log(paket);
}
