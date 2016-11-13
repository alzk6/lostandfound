
#!/bin/bash
#We should probably use git for this project
#I know its a pain but its better than google drive or emailing files or silly stuff like that
#I assume you guys have messed with git before but in this file there is a basic run down of what to do.
#git is a decentralized version control system
#the master branch is the repository stored on github
#when you checkout the master branch, you get a local copy of the source files that you can edit
#to get the files from the master branch you will have to git checkout the files.
#the first time you do this you will use this command:git checkout https://github.com/benkrueger/lostandfound.git
#which will clone the files into your local directory.
#after you do this, all you will have to run will be:
git pull 
#which will give you the latest versions of all the files in the repo.
#now, to update files in the master repo.
#you have to use this command to add all the files in the directory to git tracking
git add *
#commit to local repo, Replace Ben in the message with your name.
git commit -m "Ben's commit.'"
#push back to master branch (my github repo) you will need a github account for this (it will ask you for username/password).
git push origin master

#there is the basic gist of git. Now if git sees a change in the same file that conflict with each other, it will cause a 
#merge conflict, in which case it will ask you 
