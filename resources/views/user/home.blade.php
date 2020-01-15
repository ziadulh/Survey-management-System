@extends(\Auth::check() ? 'admin.master' : 'user.master')
