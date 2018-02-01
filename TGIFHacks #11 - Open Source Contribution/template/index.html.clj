; @layout  impress
; @title   oss

(slide
  (h1 {:class "x-large"} "Open Source Contribution")
  (p "A Gentle Introduction"))

(slide
  (h1 "Checklist")
  (ul ["Get the source"
       "Build the development version"
       "Find a bug"
       "Comment on bug to announce your work"
       "Hack away!"
       "Test your fix/addition"
       "Submit for review"]))

(slide
  (h1 "Get the source")
  (p "Find the source of the project you want to contribute to. E.g.")
  (p "Firefox")
  (code "hg clone https://hg.mozilla.org/mozilla-central"))

(slide
  (h1 "Build the development version")
  (p "Follow project's intructions")
  (ul [(link "Firefox"
             "https://developer.mozilla.org/en-US/docs/Simple_Firefox_build")
       (link "Python"
             "http://docs.python.org/devguide/")
       (link "Rust"
             "https://github.com/mozilla/rust")]))

(slide
  (h1 "Find a bug")
  (p "This will be the second most time-consuming task. "
     "Usually, there are easy bugs for new comers to get started.")
  (ul [(link "Firefox"
             "https://bugzilla.mozilla.org/buglist.cgi?quicksearch=sw:[good%20first%20bug]")
       (link "Python"
             "http://bugs.python.org/issue?status=1&@sort=-activity&@columns=id,activity,title,creator,status&@dispname=Easy%20issues&@startwith=0&@group=priority&keywords=6&@action=search&@filter=&@pagesize=50")
       (link "Rust"
             "https://github.com/mozilla/rust/issues?labels=E-easy&page=1&state=open")]))

(slide
  (h1 "Comment on bug to announce your work")
  (p "So as not to waste other people's effort. Just say something like this.")
  (ul ["Hey, is there anyone else working on this bug? If not, I'm interested in solving it."]))

(slide
  (h1 "Hack away!")
  (p "Let your inner nerd take over :)")
  (img "img/nerd.jpg"))

(slide
  (h1 "Test your fix/addition")
  (p "Just to make sure that you did not break others' awesome code.")
  (img "img/broken-build.png"))

(slide
  (h1 "Submit for review")
  (p "Celebrate :)")
  (img {:width "900px"} "img/code-review.png"))

(slide
  (h1 "Thanks for listening :)"))

(slide
  (p "That's too dry! Let's take an example.")
  (h1 "Mozilla Firefox"))

(slide
  (h1 "Get the source")
  (code "hg clone https://hg.mozilla.org/mozilla-central")
  (p "This will take a (long) while, go get a coffee."))

(slide
  (h1 "Build the development version")
  (code "./mach bootstrap && ./mach build")
  (p "This will take another while, go have a snack.")
  (p "WARNING! Your machine should have at least 4GB of RAM."))

(slide
  (h1 "Find a bug")
  (link "Good first bug" "https://bugzilla.mozilla.org/buglist.cgi?quicksearch=sw%3A%5Bgood+first+bug%5D+product%3Afirefox")
  (p "Remember to ask for ownership of bug."))

(slide
  (h1 "Hack away!"))

(slide
  (h1 "Testing")
  (p "In short")
  (code "make check"))

(slide
  (h1 "Submit for review")
  (link "Instructions" "https://developer.mozilla.org/en-US/docs/Mercurial_FAQ#How_can_I_generate_a_patch_for_somebody_else_to_check-in_for_me.3F"))

(slide
  (h1 "Celebrate!")
  (p "Now you're an open source contributor! Congratulations!"))

(slide
  (h1 "The end"))
