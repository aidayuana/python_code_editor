@extends('layouts.master')

@section('main')
<div class="title">Python Editor</div>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 col-md-12 mb-3">
      {{-- Menentukan tinggi dan lebar editor agar tampil dengan benar --}}
      <div id="editor" style="height: 400px; width: 100%;">print("hello world")</div>
    </div>
    <div class="col-lg-6 col-md-12">
      <button id="run-button" class="btn btn-success mb-3">Run</button>
      <div id="output" style="height: 347px; overflow-y: auto; background: #f1eeee; border-top: 1px solid #ddd; padding: 10px;"></div>
    </div>
  </div>
</div>

{{-- Script required for code editor --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/python");

    editor.setOptions({
      autoScrollEditorIntoView: true,
      copyWithEmptySelection: true,
      fontFamily: "monospace",
    });

    document.getElementById("run-button").addEventListener("click", function () {
      var outputDiv = document.getElementById("output");
      outputDiv.innerHTML = ""; // Clear previous output
      var code = editor.getValue();

      fetch("http://127.0.0.1:5000/run", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ code: code }),
      })
      .then((response) => response.json())
      .then((data) => {
        outputDiv.textContent = data.output;
      })
      .catch((error) => {
        outputDiv.textContent = "Error: " + error;
      });
    });
  });
</script>
@endsection
