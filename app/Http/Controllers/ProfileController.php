<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use App\Models\Homepage;
use App\Models\About;
use App\Models\Contact;
use App\Models\Footer;

use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(): View
    {
        $homepage = Homepage::first();

        return view('index', ['homepage' => $homepage]);
    }

    public function about(): View
    {
        $about = About::first();
        return view('about', ['about' => $about]);
    }
    public function contact(): View
    {
        $contacts = Contact::all();
        return view('contact', ['contacts' => $contacts]);
    }
    public function login(): View
    {

        return view('login');
    }
    public function auth(Request $request): RedirectResponse
    {
        $username = $request->username;
        $password = $request->password;


        if ($username === 'admin' && $password === 'admin') {
            return redirect('/admin');
        }
        return redirect('/login ');
    }

    public function admin(): View
    {
        $homepage = Homepage::first();
        return view('admin.index', ['homepage' => $homepage]);
    }
    public function profile(): View
    {
        $about = About::first();
        return view('admin.about', ['about' => $about]);
    }
    public function footer(): View
    {
        $footers = Footer::all();

        return view('admin.footer_link', ['footers' => $footers]);
    }

    public function contactMe(): View
    {
        $contacts = Contact::all();

        return view('admin.contact_me', ['contacts' => $contacts]);
    }

    public function store_homepage(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'address'     => 'required',
            'description'   => 'required|min:10'
        ]);

        $image = $request->file('image');

        $image->storeAs('public/img', $image->hashName());

        Homepage::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'address'     => $request->address,
            'description'   => $request->description
        ]);
        return redirect('/admin');
    }
    public function store_about(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'address'     => 'required',
            'cotent'   => 'required|min:10'
        ]);

        $image = $request->file('image');

        $image->storeAs('public/img', $image->hashName());

        About::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'address'     => $request->address,
            'cotent'   => $request->cotent
        ]);
        return redirect('/admin/about');
    }
    public function store_contact(Request $request)
    {

        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);

        Contact::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);
        return redirect('/admin/contact');
    }
    public function store_footer(Request $request)
    {

        $this->validate($request, [
            'title'     => 'required',
            'link'   => 'required'
        ]);

        Footer::create([
            'title'     => $request->title,
            'link'   => $request->link
        ]);
        return redirect('/admin/footer-link');
    }

    public function edit_homepage($id)
    {
        $homepage = Homepage::findOrFail($id);
        return view('admin.edit_homepage', compact('homepage'));
    }
    public function update_homepage(Request $request, $id)
    {
        $homepage = Homepage::findOrFail($id);

        $this->validate($request, [
            'title'       => 'required|min:5',
            'address'     => 'required',
            'description' => 'required|min:10',
            'image'       => 'image|mimes:jpeg,jpg,png|max:2048', // Tetapkan validasi untuk tipe file gambar
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Simpan gambar ke storage
            $image->storeAs('public/img', $image->hashName());

            // Update data homepage dengan nama file gambar yang baru
            $homepage->update([
                'image'       => $image->hashName(),
                'title'       => $request->title,
                'address'       => $request->address,
                'description' => $request->description
            ]);
        } else {
            // Jika tidak ada file gambar yang diunggah, hanya update title dan description
            $homepage->update([
                'title'       => $request->title,
                'address'       => $request->address,
                'description' => $request->description
            ]);
        }

        return redirect('/admin');
    }

    public function edit_about($id)
    {
        $about = About::findOrFail($id);
        return view('admin.edit_about', compact('about'));
    }
    public function update_about(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $this->validate($request, [
            'title'       => 'required|min:5',
            'address'     => 'required',
            'cotent' => 'required|min:10',
            'image'       => 'image|mimes:jpeg,jpg,png|max:2048', // Tetapkan validasi untuk tipe file gambar
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Simpan gambar ke storage
            $image->storeAs('public/img', $image->hashName());

            // Update data about dengan nama file gambar yang baru
            $about->update([
                'image'       => $image->hashName(),
                'title'       => $request->title,
                'address'       => $request->address,
                'cotent' => $request->cotent
            ]);
        } else {
            // Jika tidak ada file gambar yang diunggah, hanya update title dan description
            $about->update([
                'title'       => $request->title,
                'address'       => $request->address,
                'cotent' => $request->cotent
            ]);
        }

        return redirect('/admin/about');
    }

    public function edit_contact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.edit_contact', compact('contact'));
    }
    public function update_contact(Request $request, $id)
    {
        $footer = Contact::findOrFail($id);
        // Update data footer
        $footer->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/admin/contact');
    }
    public function edit_footer($id)
    {
        $footer = Footer::findOrFail($id);
        return view('admin.edit_footer', compact('footer'));
    }
    public function update_footer(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
        // Update data footer
        $footer->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect('/admin/footer-link');
    }

    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        return redirect('/admin/footer-link')->with('success', 'Footer link deleted successfully.');
    }

    public function destroyHomepage($id)
    {
        $homepage = Homepage::findOrFail($id);

        Storage::delete('public/img/' . $homepage->image);
        $homepage->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus');
    }
    public function destroyAbout($id)
    {
        $about = About::findOrFail($id);

        Storage::delete('public/img/' . $about->image);
        $about->delete();

        return redirect('/admin/about')->with('success', 'Data berhasil dihapus');
    }
    public function destroyContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/admin/contact')->with('success', 'Data berhasil dihapus');
    }
}
