var x = 0;

function appendToChild(id, pointer) {
	x++;
	document.getElementById("toDelete").remove();
	var element = document.getElementById(id);
	var pointer = document.getElementById(pointer);

	var tag = document.createElement("tr");
	tag.setAttribute("id", "tr");
	element.appendChild(tag);
	var tr = document.getElementById("tr");

	var tag = document.createElement("td");
	tag.setAttribute("id", "td");
	tr.appendChild(tag);
	var td = document.getElementById("td");
	td.appendChild(document.createTextNode(x+1+"."));
	td.setAttribute("id", "")

	for (i = 0; i < 2; i++) {
		var tag = document.createElement("td");
		tag.setAttribute("id", "td");
		tr.appendChild(tag);
		var td = document.getElementById("td");
		var tag = document.createElement("input");
		tag.setAttribute("required", "")
		tag.setAttribute("type", "radio");
		tag.setAttribute("value", i);
		tag.setAttribute("name", x);
		td.appendChild(tag);
		td.setAttribute("id", "")
	}
	tr.setAttribute("id", "");

	var tag = document.createElement("button");
	tag.setAttribute("type", "button")
	tag.setAttribute("onclick", "appendToChild('point', 'buttonPointer')")
	tag.setAttribute("id", "toDelete");
	tag.setAttribute("class", "btn btn-primary");
	var text = document.createTextNode("+");
	tag.appendChild(text);
	pointer.appendChild(tag);
}