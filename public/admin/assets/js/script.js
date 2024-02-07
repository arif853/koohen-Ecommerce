//Product Create page js Start--->>

var i = 1;
function addfield(){
    if (i < 5) {
        i++;
        var data = '<div class="row mt-2">'+
                '<div class="col-lg-4">'+
                // '<label class="pr-1" for="featurename-'+i+'">Name '+i+': </label>'+
                    '<input class="form-control" type="text" id="featurename-'+i+'" name="featurename['+i+']" placeholder="Name">'+
                '</div>'+
                '<div class="col-lg-8">'+
                // '<label class="pr-1" for="featurevalue-'+i+'">Value '+i+': </label>'+
                    '<input class="form-control" type="text" id="featurevalue-'+i+'" name="featurevalue['+i+']" placeholder="Value">'+
                '</div>'+
            '</div>';
    $("#morefield").append(data);
    var tot = '<input type="hidden" name="totinput" value="'+i+'">';
    $("#totfield").html(tot);
    } else {
        alert("Cannot add more than 5 rows.");
    }
}

function removeField() {
    if (i > 1) {
        $("#morefield .row:last").remove(); // Remove the last added row
        i--;

        // Update the hidden input value
        var tot = '<input type="hidden" name="totinput" value="' + i + '">';
        $("#totfield").html(tot);
    } else {
        alert("Cannot remove the last row. At least one row is required.");
    }
}


var j = 5;
function getfield(){
    var AdditionalName = document.getElementById('info_name').value;
        j++;
        var data = '<div class="row mb-3">'+
                '<div class="col-lg-4">'+
                    '<input class="form-control" type="text" readonly id="additional_name-'+j+'" name="additional_name['+j+']" value="'+AdditionalName+'">'+
                '</div>'+
                '<div class="col-lg-8 input-action">'+
                    '<input class="form-control" type="text" id="additional_value-'+j+'" name="additional_value['+j+']" placeholder="Enter require field Value.">'+
                    '<div class="btn-action ">'+
                    '<a class="rm-btn"  onclick="event.preventDefault();removegetField(this)"> <i class="fa-solid fa-times"></i> </a>'+
                    '</div>'+
                '</div>'+
            '</div>';
    $("#newfield").append(data);
    var tot = '<input type="hidden" name="totinput2" value="'+j+'">';
    $("#totfield2").html(tot);
    $('#additional_info').modal('hide');
}

function removegetField(button) {
    if (j > 5) {
        var rowToRemove = button.closest('.row');
        rowToRemove.remove();
        j--;

        // Update the hidden input value
        var tot = '<input type="hidden" name="totinput2" value="' + j + '">';
        $("#totfield2").html(tot);
    } else {
        alert("Cannot remove the last row.");
    }
}

// SKU code generate

var generatedSKUs = [];

function generateUniqueSKU() {
var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

// Shuffle the characters
var shuffledCharacters = shuffle(characters);

// Take the first 8 characters
do {
    var sku = shuffledCharacters.slice(0, 8);
} while (generatedSKUs.includes(sku));

generatedSKUs.push(sku);
return sku;
}

// Shuffle function
function shuffle(str) {
var array = str.split('');
for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
}
return array.join('');
}

var uniqueSKU = generateUniqueSKU();
document.getElementById('product_sku').value = uniqueSKU;


// window.addEventListener('scroll', function () {
//     var scrollingDiv = document.getElementById('right_bar');
//     var scrollPosition = window.scrollY;

//     // Adjust the sensitivity factor based on how fast you want the reverse scrolling
//     var sensitivity = 0.3;

//     scrollingDiv.style.transform = 'translateY(' + (-scrollPosition * sensitivity) + 'px)';
// });


// create tags

const ul = document.querySelector("ul.tag-content"),
    input = document.querySelector("input.tag-input"),
    tagsArrayInput = document.getElementById("tagsArrayInput"),
    tagNumb = document.querySelector(".tag-details span");

let maxTags = 10,
    tags = [];

countTags();
createTag();

function countTags() {
    input.focus();
    tagNumb.innerText = maxTags - tags.length;
    // Update the hidden input field with the serialized JSON of the tags array
    tagsArrayInput.value = tags;
}

function createTag() {
    ul.querySelectorAll("li").forEach((li) => li.remove());
    tags
        .slice()
        .reverse()
        .forEach((tag) => {
            let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });
    countTags();
}

function remove(element, tag) {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
}

function addTag(e) {
    if (e.key == "Enter" || e.keyCode == 32) {
        let tag = e.target.value.replace(/\s+/g, " ");
        if (tag.length > 1 && !tags.includes(tag)) {
            if (tags.length < 10) {
                tag.split(",").forEach((tag) => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

input.addEventListener("keyup", addTag);

const removeBtn = document.querySelector(".tag-details button");
removeBtn.addEventListener("click", () => {
    tags.length = 0;
    ul.querySelectorAll("li").forEach((li) => li.remove());
    countTags();
});


