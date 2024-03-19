..  include:: /Includes.rst.txt

..  _data-model:

==========
Data model
==========

All records of a traditional publication are held together by a single
``PublicationResource`` which holds the main classes ``Essay``, ``Volume``,
``Agent``, and ``Tag``. The class ``Essay`` allows for extensive texts and
images and may represent either a book section, a book chapter, or a blog
entry.

Records from other data models may use a ``PublicationRelation`` to indicate a
specific page of a retrodigitised ``Volume``. ``Agent`` objects can be
indicated as authors or in other roles via an ``AuthorshipRelation``.

In addition, the model knows flexible ``LabelTag`` and ``SameAs`` classes,
which can be used to group essays and volumes via labels and to connect
entities to authority files.

..  _graphical-overview:

Graphical overview
==================

..  figure:: /DataModel/DataModel.png
    :alt: Data model of the extension
    :target: ../_images/DataModel.png
    :class: with-shadow

    Overview of the extension's data model. Check the :ref:`api-reference`
    for further details.
