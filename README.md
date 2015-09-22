# ECU-Stapler
Edith Cowan University Assignment Stapler

The process of creating an assignment cover sheet and then either importing it into an existing Word document or merging
a bunch of PDFs together is time consuming and fraught with peril (particularly off the back of an 8 hour session with
only minutes to submit).

Enter the stapler - give it the details for your cover sheet and as many PDFs as you'd like, and it'll generate the cover
and merge all your assignment content into one shiny PDF, ready for TurnItIn to ruin and your tutor to criticise.

The cover is generated using the excellent (if somewhat neglected) FPDF library:
http://www.fpdf.org

Merging PDFs is performed using native calls to PDFtk, which the server will need installed:
https://www.pdflabs.com/tools/pdftk-the-pdf-toolkit/
(on Debian based servers: apt-get install pdftk)

Multi-file uploading is provided courtesy of code pillaged from this here thing:
http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/

...which in turn is based on the excellent, if far more comprehensive than necessary (for this project), jQuery File Upload:
https://github.com/blueimp/jQuery-File-Upload

As an interface, the file upload process leaves much to be desired, but took all of 15 minutes to implement, so there you go.
