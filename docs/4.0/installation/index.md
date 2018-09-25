---
layout: page
title: Installation
permalink: /docs/4.0/installation
version: 4.0
order: 3
---

There is no real installation for the project itself, but if you're not familiar with git and cloning a new project here is what you need to do to get the project on your machine:

Clone the project to your local machine to start a new project.

```bash
git clone --depth=1 https://github.com/Blake-C/wp-foundation-six.git name-of-your-project
```

To start a new project cd into name-of-your-project and delete the .git directory. Then run a new git init.

```bash
cd name-of-your-project
rm -r .git
git init
```

Commit the inital state of the project and push to the remote repo if one exists.

```bash
git add .
git commit -m "Initial Commit"
git push origin master
```
