<!-- put in session -->
$request->session()->put("key","value")
session(['User'=>"value"])
<!-- check value  -->
$request->session()->has("key")
session()->key("key")
<!-- get value  -->
$request->session()->get("key")
session("key")
<!-- destroy -->
$request->session()->forget("key")
$request->session()->forget("key1","key1")
$request->session()->flush();
<!-- flash value  -->
$request->session()->flash("status","success")