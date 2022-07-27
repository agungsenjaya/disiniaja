function addFrame(e) {
    let pak = e;
    pak.qty = 1;
    frame.push(pak);

    subtotal += parseInt(e.price.replace(".", ""));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`.frame-${e.id}`).addClass("opacity-0");

    $("#tambah").append(` <li class="list-group-item border-0 frame" id="frame-${e.id}" data-price="${e.price.replace(".", "")}" data-total="${e.price.replace(".", "")}">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary" onClick="delFrame(${e.id})">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary text-capitalize">Frame ${e.name}</h6>
                <div class="d-flex justify-content-between">
                  <div>
                    Rp <span class="price-text">${e.price}</span>
                  </div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary min-${e.id}" disabled onClick="minFrame(${e.id})" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control frame-form-${e.id}" disabled value="1">
  <button class="btn btn-primary plus-${e.id}" onClick="plusFrame(${e.id})" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>`);

    // console.log(frame);
}

function delFrame(e) {
    subtotal -= parseInt($(`#frame-${e}`).attr("data-total"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));

    $(`#frame-${e}`).remove();
    frame = frame.filter(function (ele) {
        return ele.id != e;
    });

    $(`.frame-${e}`).removeClass("opacity-0");

    console.log(subtotal);
}

function plusFrame(e) {
    $(`.min-${e}`).removeAttr("disabled");
    let a = $(`.frame-form-${e}`).val();
    let b = parseInt(a) + 1;
    $(`.frame-form-${e}`).val(b);
    let c = parseInt($(`#frame-${e}`).attr("data-total")) + parseInt($(`#frame-${e}`).attr("data-price"));
    $(`#frame-${e}`).attr("data-total", c);
    $(`#frame-${e} .price-text`).text(c.toLocaleString("id-ID"));
    frame = frame.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal += parseInt($(`#frame-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(frame);
}

function minFrame(e) {
    let a = $(`.frame-form-${e}`).val();
    let b = parseInt(a) - 1;
    if (b <= 1) {
        $(`.min-${e}`).attr("disabled", true);
    }
    $(`.frame-form-${e}`).val(b);
    let c = parseInt($(`#frame-${e}`).attr("data-total")) - parseInt($(`#frame-${e}`).attr("data-price"));
    $(`#frame-${e}`).attr("data-total", c);
    $(`#frame-${e} .price-text`).text(c.toLocaleString("id-ID"));

    frame = frame.map((obj) => {
        if (obj.id === e) {
            return { ...obj, qty: b };
        }
        return obj;
    });
    subtotal -= parseInt($(`#frame-${e}`).attr("data-price"));
    $("#sub-total").text(subtotal.toLocaleString("id-ID"));
    console.log(subtotal);
    // console.log(frame);
}