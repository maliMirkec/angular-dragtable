<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <title>Angular Dragtable</title>
</head>
<body>
  <div class="container py-1" ng-app="DemoApp" ng-controller="DemoController as Ctrl">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="mt-2 mb-3">Angular Dragtable</h1>
        <p class="lead">Directive that allows reorder of table columns.</p>
        <p>If you interested how to use this directive, please read this article: <a href="https://silvestarbistrovic.from.hr/en/articles/angular-dragtable">Angular dragtable</a></p>
      </div>
    </div>
    <hr class="my-2">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-3">Usage</h2>
        <p>First include Angular Dragtable in your project:</p>
<pre><code>(function (DemoApp) {
  'use strict';

  DemoApp = angular.module('DemoApp', ['Dragtable']);

  DemoApp.config(function () {});
}(this));</code></pre>
        <p>To allow column reorder, add directives <code>drag-me</code> and <code>drop-me</code> on <code>th</code> elements, like this:</p>
<pre><code>&lt;table&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;ID&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Name&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Description&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Age&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;1&lt;/td&gt;
      &lt;td&gt;Item 1&lt;/td&gt;
      &lt;td&gt;Description 1&lt;/td&gt;
      &lt;td&gt;1&lt;/td&gt;
    &lt;/tr&gt;
    ...
  &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
      </div>
    </div>
    <hr class="my-2">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-3">Options</h2>
        <h4 class="mb-3">handle</h4>
        <p>To prevent drag event on whole `th` element, provide `data-handle` attribute with handle selector, like this:</p>
<pre><code>&lt;th drag-me drop-me data-handle=".handle"&gt;Name &lt;span class="handle"&gt;Handle&lt;/span&gt;&lt;/th&gt;</code></pre>
        <p>Now column could be dragged only using provided handle element.</p>
        <p><i>Note that handle element should be inside of <code>th</code> element.</i></p>
        <h4 class="mb-3">limit</h4>
        <p>To prevent performance issues, you could limit the number of <i>ghost</i> elements by providing <code>data-limit</code> attribute.</p>
        <p>Add number of rows that should be duplicated, like this:</p>
<pre><code>&lt;th drag-me drop-me data-limit="50"&gt;Name&lt;/th&gt;</code></pre>
      </div>
    </div>
    <hr class="my-2">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-3">Demo</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-sm table-striped table-hover">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th drag-me drop-me data-limit="50" data-handle=".handle">Name <span class="badge badge-info handle">Handle</span></th>
                    <th drag-me drop-me data-limit="50" data-handle=".handle">Description <span class="badge badge-info handle">Handle</span></th>
                    <th drag-me drop-me data-limit="50">Age <span class="badge badge-info handle">Handle</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Item 1</td>
                    <td>Description 1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Item 2</td>
                    <td>Description 2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Item 3</td>
                    <td>Description 3</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Item 4</td>
                    <td>Description 4</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Item 5</td>
                    <td>Description 5</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Item 6</td>
                    <td>Description 6</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Item 7</td>
                    <td>Description 7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Item 8</td>
                    <td>Description 8</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Item 9</td>
                    <td>Description 9</td>
                    <td>9</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Item 10</td>
                    <td>Description 10</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Item 11</td>
                    <td>Description 11</td>
                    <td>11</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Item 12</td>
                    <td>Description 12</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Item 13</td>
                    <td>Description 13</td>
                    <td>13</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Item 14</td>
                    <td>Description 14</td>
                    <td>14</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Item 15</td>
                    <td>Description 15</td>
                    <td>15</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Item 16</td>
                    <td>Description 16</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Item 17</td>
                    <td>Description 17</td>
                    <td>17</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Item 18</td>
                    <td>Description 18</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>Item 19</td>
                    <td>Description 19</td>
                    <td>19</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>Item 20</td>
                    <td>Description 20</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>Item 21</td>
                    <td>Description 21</td>
                    <td>21</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>Item 22</td>
                    <td>Description 22</td>
                    <td>22</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>Item 23</td>
                    <td>Description 23</td>
                    <td>23</td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>Item 24</td>
                    <td>Description 24</td>
                    <td>24</td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>Item 25</td>
                    <td>Description 25</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>Item 26</td>
                    <td>Description 26</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>Item 27</td>
                    <td>Description 27</td>
                    <td>27</td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>Item 28</td>
                    <td>Description 28</td>
                    <td>28</td>
                </tr>
                <tr>
                    <td>29</td>
                    <td>Item 29</td>
                    <td>Description 29</td>
                    <td>29</td>
                </tr>
                <tr>
                    <td>30</td>
                    <td>Item 30</td>
                    <td>Description 30</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>31</td>
                    <td>Item 31</td>
                    <td>Description 31</td>
                    <td>31</td>
                </tr>
                <tr>
                    <td>32</td>
                    <td>Item 32</td>
                    <td>Description 32</td>
                    <td>32</td>
                </tr>
                <tr>
                    <td>33</td>
                    <td>Item 33</td>
                    <td>Description 33</td>
                    <td>33</td>
                </tr>
                <tr>
                    <td>34</td>
                    <td>Item 34</td>
                    <td>Description 34</td>
                    <td>34</td>
                </tr>
                <tr>
                    <td>35</td>
                    <td>Item 35</td>
                    <td>Description 35</td>
                    <td>35</td>
                </tr>
                <tr>
                    <td>36</td>
                    <td>Item 36</td>
                    <td>Description 36</td>
                    <td>36</td>
                </tr>
                <tr>
                    <td>37</td>
                    <td>Item 37</td>
                    <td>Description 37</td>
                    <td>37</td>
                </tr>
                <tr>
                    <td>38</td>
                    <td>Item 38</td>
                    <td>Description 38</td>
                    <td>38</td>
                </tr>
                <tr>
                    <td>39</td>
                    <td>Item 39</td>
                    <td>Description 39</td>
                    <td>39</td>
                </tr>
                <tr>
                    <td>40</td>
                    <td>Item 40</td>
                    <td>Description 40</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>41</td>
                    <td>Item 41</td>
                    <td>Description 41</td>
                    <td>41</td>
                </tr>
                <tr>
                    <td>42</td>
                    <td>Item 42</td>
                    <td>Description 42</td>
                    <td>42</td>
                </tr>
                <tr>
                    <td>43</td>
                    <td>Item 43</td>
                    <td>Description 43</td>
                    <td>43</td>
                </tr>
                <tr>
                    <td>44</td>
                    <td>Item 44</td>
                    <td>Description 44</td>
                    <td>44</td>
                </tr>
                <tr>
                    <td>45</td>
                    <td>Item 45</td>
                    <td>Description 45</td>
                    <td>45</td>
                </tr>
                <tr>
                    <td>46</td>
                    <td>Item 46</td>
                    <td>Description 46</td>
                    <td>46</td>
                </tr>
                <tr>
                    <td>47</td>
                    <td>Item 47</td>
                    <td>Description 47</td>
                    <td>47</td>
                </tr>
                <tr>
                    <td>48</td>
                    <td>Item 48</td>
                    <td>Description 48</td>
                    <td>48</td>
                </tr>
                <tr>
                    <td>49</td>
                    <td>Item 49</td>
                    <td>Description 49</td>
                    <td>49</td>
                </tr>
                <tr>
                    <td>50</td>
                    <td>Item 50</td>
                    <td>Description 50</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>51</td>
                    <td>Item 51</td>
                    <td>Description 51</td>
                    <td>51</td>
                </tr>
                <tr>
                    <td>52</td>
                    <td>Item 52</td>
                    <td>Description 52</td>
                    <td>52</td>
                </tr>
                <tr>
                    <td>53</td>
                    <td>Item 53</td>
                    <td>Description 53</td>
                    <td>53</td>
                </tr>
                <tr>
                    <td>54</td>
                    <td>Item 54</td>
                    <td>Description 54</td>
                    <td>54</td>
                </tr>
                <tr>
                    <td>55</td>
                    <td>Item 55</td>
                    <td>Description 55</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td>56</td>
                    <td>Item 56</td>
                    <td>Description 56</td>
                    <td>56</td>
                </tr>
                <tr>
                    <td>57</td>
                    <td>Item 57</td>
                    <td>Description 57</td>
                    <td>57</td>
                </tr>
                <tr>
                    <td>58</td>
                    <td>Item 58</td>
                    <td>Description 58</td>
                    <td>58</td>
                </tr>
                <tr>
                    <td>59</td>
                    <td>Item 59</td>
                    <td>Description 59</td>
                    <td>59</td>
                </tr>
                <tr>
                    <td>60</td>
                    <td>Item 60</td>
                    <td>Description 60</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td>61</td>
                    <td>Item 61</td>
                    <td>Description 61</td>
                    <td>61</td>
                </tr>
                <tr>
                    <td>62</td>
                    <td>Item 62</td>
                    <td>Description 62</td>
                    <td>62</td>
                </tr>
                <tr>
                    <td>63</td>
                    <td>Item 63</td>
                    <td>Description 63</td>
                    <td>63</td>
                </tr>
                <tr>
                    <td>64</td>
                    <td>Item 64</td>
                    <td>Description 64</td>
                    <td>64</td>
                </tr>
                <tr>
                    <td>65</td>
                    <td>Item 65</td>
                    <td>Description 65</td>
                    <td>65</td>
                </tr>
                <tr>
                    <td>66</td>
                    <td>Item 66</td>
                    <td>Description 66</td>
                    <td>66</td>
                </tr>
                <tr>
                    <td>67</td>
                    <td>Item 67</td>
                    <td>Description 67</td>
                    <td>67</td>
                </tr>
                <tr>
                    <td>68</td>
                    <td>Item 68</td>
                    <td>Description 68</td>
                    <td>68</td>
                </tr>
                <tr>
                    <td>69</td>
                    <td>Item 69</td>
                    <td>Description 69</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>70</td>
                    <td>Item 70</td>
                    <td>Description 70</td>
                    <td>70</td>
                </tr>
                <tr>
                    <td>71</td>
                    <td>Item 71</td>
                    <td>Description 71</td>
                    <td>71</td>
                </tr>
                <tr>
                    <td>72</td>
                    <td>Item 72</td>
                    <td>Description 72</td>
                    <td>72</td>
                </tr>
                <tr>
                    <td>73</td>
                    <td>Item 73</td>
                    <td>Description 73</td>
                    <td>73</td>
                </tr>
                <tr>
                    <td>74</td>
                    <td>Item 74</td>
                    <td>Description 74</td>
                    <td>74</td>
                </tr>
                <tr>
                    <td>75</td>
                    <td>Item 75</td>
                    <td>Description 75</td>
                    <td>75</td>
                </tr>
                <tr>
                    <td>76</td>
                    <td>Item 76</td>
                    <td>Description 76</td>
                    <td>76</td>
                </tr>
                <tr>
                    <td>77</td>
                    <td>Item 77</td>
                    <td>Description 77</td>
                    <td>77</td>
                </tr>
                <tr>
                    <td>78</td>
                    <td>Item 78</td>
                    <td>Description 78</td>
                    <td>78</td>
                </tr>
                <tr>
                    <td>79</td>
                    <td>Item 79</td>
                    <td>Description 79</td>
                    <td>79</td>
                </tr>
                <tr>
                    <td>80</td>
                    <td>Item 80</td>
                    <td>Description 80</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>81</td>
                    <td>Item 81</td>
                    <td>Description 81</td>
                    <td>81</td>
                </tr>
                <tr>
                    <td>82</td>
                    <td>Item 82</td>
                    <td>Description 82</td>
                    <td>82</td>
                </tr>
                <tr>
                    <td>83</td>
                    <td>Item 83</td>
                    <td>Description 83</td>
                    <td>83</td>
                </tr>
                <tr>
                    <td>84</td>
                    <td>Item 84</td>
                    <td>Description 84</td>
                    <td>84</td>
                </tr>
                <tr>
                    <td>85</td>
                    <td>Item 85</td>
                    <td>Description 85</td>
                    <td>85</td>
                </tr>
                <tr>
                    <td>86</td>
                    <td>Item 86</td>
                    <td>Description 86</td>
                    <td>86</td>
                </tr>
                <tr>
                    <td>87</td>
                    <td>Item 87</td>
                    <td>Description 87</td>
                    <td>87</td>
                </tr>
                <tr>
                    <td>88</td>
                    <td>Item 88</td>
                    <td>Description 88</td>
                    <td>88</td>
                </tr>
                <tr>
                    <td>89</td>
                    <td>Item 89</td>
                    <td>Description 89</td>
                    <td>89</td>
                </tr>
                <tr>
                    <td>90</td>
                    <td>Item 90</td>
                    <td>Description 90</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>91</td>
                    <td>Item 91</td>
                    <td>Description 91</td>
                    <td>91</td>
                </tr>
                <tr>
                    <td>92</td>
                    <td>Item 92</td>
                    <td>Description 92</td>
                    <td>92</td>
                </tr>
                <tr>
                    <td>93</td>
                    <td>Item 93</td>
                    <td>Description 93</td>
                    <td>93</td>
                </tr>
                <tr>
                    <td>94</td>
                    <td>Item 94</td>
                    <td>Description 94</td>
                    <td>94</td>
                </tr>
                <tr>
                    <td>95</td>
                    <td>Item 95</td>
                    <td>Description 95</td>
                    <td>95</td>
                </tr>
                <tr>
                    <td>96</td>
                    <td>Item 96</td>
                    <td>Description 96</td>
                    <td>96</td>
                </tr>
                <tr>
                    <td>97</td>
                    <td>Item 97</td>
                    <td>Description 97</td>
                    <td>97</td>
                </tr>
                <tr>
                    <td>98</td>
                    <td>Item 98</td>
                    <td>Description 98</td>
                    <td>98</td>
                </tr>
                <tr>
                    <td>99</td>
                    <td>Item 99</td>
                    <td>Description 99</td>
                    <td>99</td>
                </tr>
                <tr>
                    <td>100</td>
                    <td>Item 100</td>
                    <td>Description 100</td>
                    <td>100</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="./bower_components/jquery/dist/jquery.min.js"></script>
  <script src="./bower_components/tether/dist/js/tether.min.js"></script>
  <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="./bower_components/angular/angular.min.js"></script>
  <script src="./demo/dist/demo.js"></script>
</body>
</html>
