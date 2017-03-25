# NTUOSS TGIFHacks #44 - RESTful API

## Introduction

This is a detailed walk through on how to design and develop a RESTful API. During the whole workshop, please refer to this guide for all the coding details. If you follow this guide closely, you should be able to build a simple RESTful API at the end of the workshop. Now let's begin!

## Setting up the Django environment

I recommend using [Cloud9](https://c9.io) for this workshop. All you have to do is to create an account and then create a public workspace. You don't need to setup Python or Django on your own laptop.

Once the workspace is created, we need to change some settings to finish the setup. First of all, I would like you to know that the directory structure of a Django project looks like this:

```
[rest_api_project]/
├── [rest_api_project]/
│   ├── __init__.py
│   ├── settings.py
│   ├── urls.py
│   ├── wsgi.py
└── manage.py   
```

Every time a Django project is created, there will be a folder with the same name of the project inside the project folder. All project settings are inside that folder. Later we will edit the files in this folder.

Before we do anything, let's run the server to check whether the project is setup properly. Execute the following command:

```Shell
$ python manage.py migrate
$ python manage.py runserver $IP:$PORT
```
Now go to the URL for your project. You should be able to see a page that says **It worked!** The setup is almost done, let's create a superuser. Run the following command:

```Shell
$ python manage.py createsuperuser
```

Remember the username and password! We shall use it later in the admin panel. The last step is to install the ```django-rest-framework``` which we'll need when developing the API. Run the following command:

```Shell
$ sudo pip install djangorestframework
```

## Create an app for the API

A Django project consists of one or more apps. The apps may be third party apps or apps created by you. In this project, we should create one app for the API. Run the following command:

```Shell
$ python manage.py startapp api
```

Now the app is created, we need to add it in the setting file so Django knows an app has been added. Also we need to do the same for the ```django-rest-framework``` we just installed. Add the following two lines to ```rest_api_project/settings.py```:

```python
INSTALLED_APPS = [
    ...
    'rest_framework',
    'api'
]
```

## Create models

Before we create any API, we need to have some data to show in the API. To do this, we need to define some models in ```api/models.py```. A model represents an entity, and corresponds to a table in the database. Let's make a model for **course** and another one for **school**. Open ```api/models.py``` and add the following Python code:

```Python
# Create your models here.
class Course(models.Model):
    
    code = models.CharField(max_length=10, primary_key=True)
    title = models.CharField(max_length=100)
    au = models.IntegerField()
    content = models.CharField(max_length=500)

	def __unicode__(self):
        return self.code
    
class School(models.Model):
    
    name = models.CharField(max_length=100)
    abbrev = models.CharField(max_length=10, primary_key=True)
    description = models.CharField(max_length=500)

	def __unicode__(self):
        return self.abbrev
```

Every time the models are modified, we need to migrate it to apply the changes to the database. Run the following command to migrate:

```Shell
$ python manage.py makemigrations
$ python manage.py migrate
```

Now that we have two models, let's add some real data to them. To do this, add the following lines in ```api/admin.py```:

```Python
from .models import Course, School

admin.site.register(Course)
admin.site.register(School)
```

Then we can log in to the admin site and add some data there.

## Create serializers

Now we have some models defined, we need to specify how the models are displayed using the API. For APIs, serializers control what information should be displayed. Create a new file ```api/serializers.py``` and add the following code:

```Python
from rest_framework import serializers
from .models import Course, School

class CourseSerializer(serializers.ModelSerializer):
    
    class Meta:
        model = Course
        
class SchoolSerializer(serializers.ModelSerializer):
    
    class Meta:
        model = School
```

## Create views

Views defines how we should handle incoming requests. For the API, we need to make sure the correct information is included in the response. Add the following code to ```api/views.py```:

```Python
from rest_framework.views import APIView
from rest_framework.response import Response
from .models import Course, School
from .serializers import CourseSerializer, SchoolSerializer

# Create your views here.
class CourseList(APIView):
    
    def get(self, request):
        courses = Course.objects.all()
        serializer = CourseSerializer(courses, many=True)
        return Response(serializer.data)
        
class SchoolList(APIView):
    
    def get(self, request):
        schools = School.objects.all()
        serializer = SchoolSerializer(schools, many=True)
        return Response(serializer.data)
```

## Assign URLs

We've created models, serializers and views. Let's assign URLs to the views so that when we type an URL in the browser, it's mapped to a certain view. Add the following lines to ```rest_api_project/urls.py```:

```Python
from api import views

urlpatterns = [
	...
    url(r'^api/courses/', views.CourseList.as_view()),
    url(r'^api/schools/', views.SchoolList.as_view()),
]
```

## Conclusion

Congratulations! You've just made a simple API by yourself. It's not that hard, isn't it? With the power of ```django-rest-framework```, we can easily create powerful RESTful APIs.

I hope everyone learns something from today's workshop. And I hope you can build much better APIs in the future.
