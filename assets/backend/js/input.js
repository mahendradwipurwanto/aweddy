/*
We want to preview images, so we need to register the Image Preview plugin
*/
FilePond.registerPlugin(


	// validates the size of the file
	FilePondPluginFileValidateSize,

	// corrects mobile image orientation
	FilePondPluginImageExifOrientation,

	// previews dropped images
  FilePondPluginImagePreview
);

    var pond = FilePond.create(document.querySelector('input[type="file"]'));
