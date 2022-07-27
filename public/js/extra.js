function addExtra(e) {
    let pak = e;
    pak.qty = 1;
    extra.push(pak);

    subtotal += parseInt(e.price.replace(".", ""));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`.extra-${e.id}`).addClass("opacity-0");

    $("#tambah").append(` <li class="list-group-item border-0 extra" id="extra-${e.id}" data-price="${e.price.replace(".", "")}" data-total="${e.price.replace(".", "")}">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary" onClick="delExtra(${e.id})">
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
  <button class="btn btn-primary min-${e.id}" disabled onClick="minExtra(${e.id})" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control extra-form-${e.id}" disabled value="1">
  <button class="btn btn-primary plus-${e.id}" onClick="plusExtra(${e.id})" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>`);

    // console.log(extra);
}

function delExtra(e) {
    subtotal -= parseInt($(`#extra-${e}`).attr("data-total"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`#extra-${e}`).remove();
    extra = extra.filter(function (ele) {
        return ele.id != e;
    });

    $(`.extra-${e}`).removeClass("opacity-0");

    console.log(subtotal);
}

function plusExtra(e) {
    $(`.min-${e}`).removeAttr("disabled");
    let a = $(`.extra-form-${e}`).val();
    let b = parseInt(a) + 1;
    $(`.extra-form-${e}`).val(b);
    let c = parseInt($(`#extra-${e}`).attr("data-total")) + parseInt($(`#extra-${e}`).attr("data-price"));
    $(`#extra-${e}`).attr("data-total", c);
    $(`#extra-${e} .price-text`).text(c.toLocaleString("id-ID"));
    extra = extra.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal += parseInt($(`#extra-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(extra);
}

function minExtra(e) {
    let a = $(`.extra-form-${e}`).val();
    let b = parseInt(a) - 1;
    if (b <= 1) {
        $(`.min-${e}`).attr("disabled", true);
    }
    $(`.extra-form-${e}`).val(b);
    let c = parseInt($(`#extra-${e}`).attr("data-total")) - parseInt($(`#extra-${e}`).attr("data-price"));
    $(`#extra-${e}`).attr("data-total", c);
    $(`#extra-${e} .price-text`).text(c.toLocaleString("id-ID"));

    extra = extra.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal -= parseInt($(`#extra-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(subtotal);
    // console.log(extra);
}